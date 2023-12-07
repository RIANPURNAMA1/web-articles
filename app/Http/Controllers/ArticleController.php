<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function allArtikel()
    {
        $user = Auth::user();
        $articles = $user->articles;
        return view('components.semuaArtikel', compact('articles'));
    }

    public function article(Request $request)
    {
        $searchQuery = $request->input('search');

        // Assuming you have an Article model
        $data = Article::when($searchQuery, function ($query, $searchQuery) {
            return $query->where('title', 'like', '%' . $searchQuery . '%')
                ->orderByDesc('last_updated_at')
                ->orWhere('body', 'like', '%' . $searchQuery . '%');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.artikel', compact('data'));
    }

    public function userArticle($userId)
    {

        $user = User::find($userId);

        if (!$user) {
            abort(404); // Tambahkan penanganan jika user tidak ditemukan
        }
        // Mengambil semua komentar berdasarkan artikel
        $article = Article::where('user_id', $user->id)->get();
        $comments = Comment::whereIn('article_id', $article->pluck('id'))->get();
        return view('components.userArtikel', compact('article', 'user', 'comments'));
    }


    // ArticleController.php
    public function detail($id)
    {
        $detail = Article::find($id);
        $comments = Comment::where('article_id', $id)->get();
        return view('components.detail', compact('detail', 'comments'));
    }

    public function commentStore(Request $request, $articleId)
    {

        $request->validate([
            'comment' => 'required|string',
        ]);


        $article = Article::find($articleId);


        $comment = new Comment([
            'comment' => $request->input('comment'),
            'user_id' => auth()->user()->id

        ]);
        $article->comments()->save($comment);
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function detailComment($id)
    {
        $detail = Article::find($id);
        $comments = Comment::where('article_id', $id)->get();
        return view('components.detailComment', compact('detail', 'comments'));
    }
}
