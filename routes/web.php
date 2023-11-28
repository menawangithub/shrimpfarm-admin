<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageContent;
use App\Http\Controllers\FormController;
use App\Http\Controllers\InfoBudidayaController;
use App\Http\Controllers\UserAuthRegisterController;
use App\Http\Controllers\UserAuthLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth-login');
});

Route::get('/index', [HomeController::class, 'index']);
Route::get('/onboard', [HomeController::class, 'onboard']);

//KONTEN EDUKASI
Route::get('/kontenedukasi', [ViewController::class, 'viewAllContent'])->name('kontenedu');
Route::get('/kontenedukasi/{page}', [ViewController::class, 'getArticles'])->name('kontenedu');
Route::get('/VideoBudidaya/{id}', [ViewController::class, 'viewVideo'])->name('VideoBudidaya');
Route::post('/PostComment', [ViewController::class, 'postComment'])->name('PostComment');
Route::get('/ArtikelBudidaya/{id}', [ViewController::class, 'viewArticle'])->name('ArtikelBudidaya');
Route::post('/PostCommentArticle', [ViewController::class, 'postCommentArticle'])->name('PostCommentArticle');

//KONSULTASI BUDIDAYA
Route::get('/viewmentor', [HomeController::class, 'viewmentor'])->name('viewmentor');

//DAFTAR TUGAS --- TODO BUDIDAYA
Route::get('/daftartugas', [ViewController::class, 'daftartugas'])->name('daftartugas');
Route::get('/viewtotal/{id}', [HomeController::class, 'viewtugas'])->name('viewtotal');
Route::get('/viewparsial/{id}', [HomeController::class, 'viewparsial'])->name('viewparsial');
Route::post('/updateprogress/{id}', [ViewController::class, 'updateProgress'])->name('updateProgress');

//FAQ
Route::get('/kelolafaq', [ManageContent::class, 'indexFaq'])->name('kelolafaq');
Route::get('/AddDataFaq', [HomeController::class, 'AddDataFaq']);
Route::post('/saveAddDataFaq', [FormController::class, 'saveAddDataFaq'])->name('saveAddDataFaq');
Route::get('/EditDataFaq/{id}', [FormController::class, 'EditDataFaq']);
Route::post('/saveEditDataFaq/{id}', [FormController::class, 'saveEditDataFaq'])->name('saveEditDataFaq');

//PROFILE
Route::get('/viewprofile/{id}', [ProfileController::class, 'getProfile'])->name('viewprofile');
Route::post('/profile/{id}', [ProfileController::class, 'updateProfile'])->name('updateprofile');
Route::get('/getprovinces', [ProfileController::class, 'getProvinces']);



// AUTENTIKASI LOGIN
Route::get('/authlogin', [HomeController::class, 'authlogin']);
Route::post('/login', [UserAuthLoginController::class, 'saveAuthLogin'])->name('login');
Route::get('/logout', [UserAuthLoginController::class, 'logout'])->name('logout');

// AUTENTIKASI REGISTER
Route::get('/authregister', [HomeController::class, 'authregister']);
Route::post('/register', [UserAuthRegisterController::class, 'saveRegister'])->name('register');

//AUTENTIKASI FORGOT PASSWORD
Route::get('/forgotpass', [HomeController::class, 'forgotpass'])->name('forgotpass');

// INFO PANEN
Route::get('/kelolavideo', [ManageContent::class, 'index'])->name('kelolavideo');
Route::get('/AddDataVideo', [HomeController::class, 'AddDataVideo']);
Route::post('/saveAddDataVideo', [FormController::class, 'saveAddDataVideo'])->name('saveAddDataVideo');
Route::get('/EditDataVideo/{id}', [FormController::class, 'EditDataVideo']);
Route::post('/saveEditDataVideo/{id}', [FormController::class, 'saveEditDataVideo'])->name('saveEditDataVideo');

// INFO BUDIDAYA
Route::get('/kelolaartikel', [ManageContent::class, 'indexArtikel'])->name('kelolaartikel');
Route::get('/AddDataArtikel', [HomeController::class, 'AddDataArtikel']);
Route::post('/saveAddDataArtikel', [FormController::class, 'saveAddDataArtikel'])->name('saveAddDataArtikel');
Route::get('/EditDataArtikel/{id}', [FormController::class, 'EditDataArtikel']);
Route::post('/saveEditDataArtikel/{id}', [FormController::class, 'saveEditDataArtikel'])->name('saveEditDataArtikel');