<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Sale;

class ListController extends Controller
{
    public function list()
    {

        $sales = DB::table('sales')->get();
        return view('pages.list',['sales' => $sales]);
    }
}
