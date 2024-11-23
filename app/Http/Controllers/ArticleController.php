<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $articles = Article::all(); // Ambil semua data artikel dari database
        // return view('crud', compact('articles')); // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required'],
            'image' => ['required', 'image'],
            'body' => ['required', 'min:20'],
        ]);

        // Simpan gambar ke storage
        $imagePath = $request->file('image')->store('post/image', 'public');

        // Simpan data ke database
        Article::create([
            'title' => $validatedData['title'],
            'image' => $imagePath,
            'body' => $validatedData['body'],
        ]);

        return redirect()->route('article.index')->with('success', 'Article successfully created!');
    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
        $articles = Article::all(); // Ambil semua data artikel dari database
        return view('crud', compact('articles')); // Kirim data ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
