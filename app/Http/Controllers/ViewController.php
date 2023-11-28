<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\VideoModel;
use App\Models\ArtikelModel;
use App\Models\CommentModel;
use App\Models\CommentArticleModel;
use App\Models\TodoModel;
use App\Models\ListTodoTotalModel;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ViewController extends Controller
{
    public function viewAllContent(){
        $videos = VideoModel::all();
        $articles = ArtikelModel::all();

        $videosPaginator = $this->paginate($videos, 3);
        $articlesPaginator = $this->paginate($articles, 4); 
    
        return view('kontenedu', ['videos' => $videosPaginator, 'articles' => $articlesPaginator]);
    }

    private function paginate($items, $perPage)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($items->all(), ($currentPage - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator($currentItems, count($items), $perPage);

        return $paginator->withPath(LengthAwarePaginator::resolveCurrentPath());
    }

    public function viewVideo($id){
        $video = VideoModel::find($id);
        return view('konteneduvideo', ['data' => $video]);
    }

    public function postComment(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required|max:255',
        ]);
    
        $id_video = $request->input('id_video');
        $id = $request->input('id');
        $nama_user = $request->input('nama_user');

        $user = UserModel::find($id);
        $video = VideoModel::find($id_video);
    
        $comment = new CommentModel([
            'isi_komentar' => $request->isi_komentar,
            'tanggal_post' => now()->format('d/m/Y'),
            'id' => $user->_id,
            'nama_user' => $user->nama,
        ]);
    
        $video->comments()->save($comment);
    
        return redirect()->back()->with('success', 'Komentar Anda Berhasil Diunggah!');
    }

    public function viewArticle($id){
        $article = ArtikelModel::find($id);
        return view('konteneduartikel', ['data' => $article]);
    }

    public function postCommentArticle (Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required|max:255',
        ]);
    
        $id_article = $request->input('id_article');
        $id = $request->input('id');
        $nama_user = $request->input('nama_user');

        $user = UserModel::find($id);
        $article = ArtikelModel::find($id_article);
    
        $comment = new CommentArticleModel([
            'isi_komentar' => $request->isi_komentar,
            'tanggal_post' => now()->format('d/m/Y'),
            'id' => $user->_id,
            'nama_user' => $user->nama,
        ]);
    
        $article->comments()->save($comment);
    
        return redirect()->back()->with('success', 'Komentar Anda Berhasil Diunggah!');
    }

    
    public function viewAllArticle(){
        $articles = ArtikelModel::all();
        return view('kontenedu', ['articles' => $articles]);
    }

    public function daftartugas()
    {
        $data = TodoModel::with('infoPanen')->get();
        return view('daftartugas', ['data' => $data]);
    }

    public function updateProgress(Request $request, $id)
    {
        // Find the TodoModel by ID
        $todo = TodoModel::find($id);

        // Get the checkbox states from the request
        $checkboxStates = $request->input('checkboxes');

        // Update the checkbox_states field in the TodoModel
        $todo->checkbox_states = json_encode($checkboxStates);
        $todo->progress = count($checkboxStates) * 10; // Assuming each checkbox increments by 10%
        $todo->save();

        // Iterate through accordion items and update them
        foreach ($checkboxStates as $idPanen => $isChecked) {
            // Find or create the ListTodoTotalModel associated with the TodoModel
            $listTodoTotal = ListTodoTotalModel::firstOrNew(['todo_id' => $todo->id, 'id_panen' => $idPanen]);

            // Update the checked field
            $listTodoTotal->checked = $isChecked;
            $listTodoTotal->save();
        }

        // Redirect to the daftartugas view with updated data
        return redirect()->route('daftartugas');
    }
}   
