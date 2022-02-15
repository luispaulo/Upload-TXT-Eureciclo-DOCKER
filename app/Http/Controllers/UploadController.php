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
            'file.required' => 'File field not required'
        ]);

        try {
            if(!$this->validateExtension($request->file('file')->getClientOriginalExtension()))
                throw new Exception("Invalid file extension, choose another file.");

            $file = $this->normalize($request->file('file')->get());

            foreach ($file as $key => $str) {
                $entry = str_getcsv($str);

                if (
                    $entry === false ||
                    $key === 0 ||
                    array_search(null, $entry) !== false ||
                    count($entry) !== 6
                ) continue;

                $arrSales[] = [
                    'buyer' => $entry[0],
                    'description' => $entry[1],
                    'unit_price' => $entry[2],
                    'quantity' => $entry[3],
                    'address' => $entry[4],
                    'supplier' => $entry[5]
                ];
            }

            if (!isset($arrSales))
                throw new Exception('File information was not accepted.');

            Sale::insert($arrSales);

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }

        return redirect('/')->with('status', 'File uploaded successfully');;
    }

}
