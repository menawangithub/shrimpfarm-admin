<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoModel;
use App\Models\ArtikelModel;
use App\Models\FaqModel;

class FormController extends Controller
{
    public function EditDataVideo($id)
    {
        $data = VideoModel::find($id); 

        return view('formvideo', ['data' => $data]);
    }

    public function saveEditDataVideo(Request $request, $id){

        $data = VideoModel::find($id);

        $data->id = $request->input('id');
        $data->judul_video = $request->input('judul_video');
        $data->deskripsi = $request->input('deskripsi');
        $data->url = $request->input('url');
        $data->tanggal_upload = $request->input('tanggal_upload');
        $data->owner = $request->input('owner');

        $data->save();

        return redirect()->route('kelolavideo');
    }

    public function saveAddDataVideo(Request $request)
    {
        $data = new VideoModel;
        $data->judul_video = $request->input('judul_video');
        $data->deskripsi = $request->input('deskripsi');
        $data->url = $request->input('url');
        $data->tanggal_upload = $request->input('tanggal_upload');
        $data->owner = $request->input('owner');

        $data->save();
        
        return redirect()->route('kelolavideo');
    }

    // Budidaya
    public function saveAddDataArtikel(Request $request){
        $data = new ArtikelModel;
        $data->judul_artikel = $request->input('judul_artikel');
        $data->penulis= $request->input('penulis');
        $data->penerbit = $request->input('penerbit');
        $data->tanggal_terbit = $request->input('tanggal_terbit');
        $data->link = $request->input('link');
        $data->gambar = $request->input('gambar');
        $data->isi_artikel = $request->input('isi_artikel');

        $data->save();
        
        return redirect()->route('kelolaartikel');
    }

    public function EditDataArtikel($id)
    {
        $data = ArtikelModel::find($id); 

        return view('formartikel', ['data' => $data]);
    }


    public function saveEditDataArtikel(Request $request, $id){
        $data = ArtikelModel::find($id);

        $data->id = $request->input('id');
        $data->judul_artikel = $request->input('judul_artikel');
        $data->penulis= $request->input('penulis');
        $data->penerbit = $request->input('penerbit');
        $data->tanggal_terbit = $request->input('tanggal_terbit');
        $data->link = $request->input('link');
        $data->gambar = $request->input('gambar');
        $data->isi_artikel = $request->input('isi_artikel');

        $data->save();

        return redirect()->route('kelolaartikel');
    }

    // Faq
    public function saveAddDataFaq(Request $request){
        $data = new FaqModel;
        $data->judul_faq = $request->input('judul_faq');
        $data->isi_faq= $request->input('isi_faq');
        $data->save();
        
        return redirect()->route('kelolafaq');
    }

    public function EditDataFaq($id)
    {
        $data = FaqModel::find($id); 

        return view('formfaq', ['data' => $data]);
    }


    public function saveEditDataFaq(Request $request, $id){
        $data = FaqModel::find($id);

        $data->_id = $request->input('id');
        $data->judul_faq = $request->input('judul_faq');
        $data->isi_faq= $request->input('isi_faq');
        $data->save();

        return redirect()->route('kelolafaq');
    }
}
