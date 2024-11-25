<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Menampilkan semua artikel
    public function index()
    {
        $articles = Article::all();
        return view('crud', compact('articles'));
    }

    // Menampilkan form untuk membuat artikel baru
    public function create()
    {
        return view('create');
    }

    // Menyimpan artikel baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required'],
            'image' => ['required', 'image'],
            'body' => ['required', 'min:5']
        ]);

        $imagePath = $request->file('image')->store('post/images', 'public');

        Article::create([
            'title' => $validatedData['title'],
            'image' => $imagePath,
            'body' => $validatedData['body']
        ]);

        return redirect('/articles');
    }

    // Menampilkan detail artikel
    public function show()
    {
        $articles = Article::all();
        return view('show', compact('articles'));
    }

    // Menampilkan form untuk mengedit artikel
    public function edit(Article $article)
    {
        return view('edit', compact('article'));
    }

    // Memperbarui artikel di database
    public function update(Request $request, Article $article)
    { 
        $validatedData = $request->validate([
            'title' => ['required'],
            'image' => ['nullable', 'image'],
            'body' => ['required', 'min:20']
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post/images', 'public');
            $article->image = $imagePath;
        }

        $article->title = $validatedData['title'];
        $article->body = $validatedData['body'];
        $article->save();
        
        return redirect('/show');
    }

    // Menghapus artikel dari database
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/show')->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}
