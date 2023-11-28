<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoModel;
use App\Models\ArtikelModel;
use App\Models\FaqModel;

class ManageContent extends Controller
{
    public function index()
    {
        $data = VideoModel::all();
            
        return view('kelolavideo', ['data' => $data]);
    }

    public function indexArtikel(Request $request)
    {
        $data = ArtikelModel::all();       
        return view('kelolaartikel', ['data' => $data]);
    }

    public function indexFaq(Request $request)
    {
        $data = FaqModel::all();       
        return view('kelolafaq', ['data' => $data]);
    }
}
