<?php

namespace App\Http\Controllers;

use App\Models\Article;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleControllerDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $articles = $user->articles;
        return view('dashboard.dataArtikel', compact('articles'));
    }


    public function create()
    {
        return view('dashboard.tambahArtikel');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);


        // Upload gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Simpan data artikel
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->image = $imageName;
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $articles = Article::find($id);
        return view('dashboard.showArticles', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        return view('dashboard.editArtikel', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Validasi formulir sesuai kebutuhan
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // Ambil artikel berdasarkan ID
        $article = Article::find($id);

        // Update data artikel
        $article->title = $request->title;
        $article->body = $request->body;


        // Upload gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $article->image = $imageName;

        // Simpan perubahan
        $article->save();

        // Redirect ke halaman lain setelah pembaruan berhasil
        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete post by ID
        Article::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
