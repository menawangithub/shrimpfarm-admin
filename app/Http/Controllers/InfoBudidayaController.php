<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoBudidayaModel;


class InfoBudidayaController extends Controller
{

    public function index(Request $request)
    {
        $data = ArtikelModel::all();       
        return view('kelolaartikel', ['data' => $data]);
    }
}
