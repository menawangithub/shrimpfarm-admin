<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoModel;
use App\Models\ListTodoTotalModel;

class HomeController extends Controller
{
    //
    public function index(){
        return view("index");
    }

    public function onboard(){
        return view("onboarding");
    }

    public function authlogin(){
        return view("auth-login");
    }

    public function profile(){
        return view("profile");
    }

    public function forgotpass(){
        return view("auth-forgot-password");
    }

    public function authregister(){
        return view("auth-register");
    }

    public function AddDataVideo(){
        $data = [];
        return view("formaddvideo", compact('data'));
    }

    public function AddDataArtikel(){
        $data = [];
        return view("formaddartikel", compact('data'));
    }

    public function AddDataFaq(){
        $data = [];
        return view("formaddfaq", compact('data'));
    }

    public function faq(){
        return view("faq");
    }

    public function viewmentor(){
        return view ("viewmentor");
    }

    public function kontenedukasi(){
        return view ("kontenedu");
    }

    public function daftartugas(){
        return view ("daftartugas");
    }
    public function viewtugas(){
        return view ("viewtugas");
    }

    public function viewparsial($id){
        $todo = TodoModel::find($id);
        $accordionItems = ListTodoTotalModel::all();
        return view("viewtugasparsial", ['todo' => $todo], ['accordionItems' => $accordionItems]);
    }
}
