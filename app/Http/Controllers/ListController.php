<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Venda;

class ListController extends Controller
{
    public function listar()
    {

        $vendas = DB::table('vendas')->get();
        return view('pages.list',['vendas' => $vendas]);
    }
}
