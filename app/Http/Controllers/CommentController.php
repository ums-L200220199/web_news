<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use App\Models\article;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $articleId)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Pastikan artikel ada
        $article = article::findOrFail($articleId);

        // Simpan komentar
        Comment::create([
            'article_id' => $article->id,
            'user_email' => Auth::user()->email, // Mendapatkan email pengguna yang sedang login
            'content' => $request->content,
        ]);

        return redirect()->route('articles.show', $article->id)->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        //
    }
}
