<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller

{

    private function validateExtension(string $extension, array $acceptedExtensions = ['txt', 'csv']): bool
    {
        return array_search($extension, $acceptedExtensions) !== false;
    }

    public function normalize(string $file): array
    {
        return explode("\n", trim(preg_replace("/\t+/", ',', $file)));
    }

    public function upload(Request $request): \Illuminate\Http\RedirectResponse
    {

        $request->validate(['file' => 'required|file'], [
            'file.required' => 'O campo do arquivo é obrigatório.'
        ]);

        try {
            if(!$this->validateExtension($request->file('file')->getClientOriginalExtension()))
                throw new Exception("Extencao de arquivo invalida,escolha outro arquivo.");

            $file = $this->normalize($request->file('file')->get());

            foreach ($file as $key => $str) {
                $entry = str_getcsv($str);

                if (
                    $entry === false ||
                    $key === 0 ||
                    array_search(null, $entry) !== false ||
                    count($entry) !== 6
                ) continue;

                $arrVendas[] = [
                    'comprador' => $entry[0],
                    'descricao' => $entry[1],
                    'preco_unitario' => $entry[2],
                    'qtd' => $entry[3],
                    'endereco' => $entry[4],
                    'fornecedor' => $entry[5]
                ];
            }

            if (!isset($arrVendas))
                throw new Exception('As informacoes do arquivos nao foram aceitas.');

            Venda::insert($arrVendas);

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }

        return redirect('/')->with('status', 'Arquivo carregado com sucesso');;
    }

}
