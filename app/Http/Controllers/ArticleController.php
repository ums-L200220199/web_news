<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ArticleController extends Controller
{
    public function index()
    {
        $articles = article::all();
        return view('admin', compact('articles'),['title' => 'ADMIN']);
    }
    public function show($id)
    {
        $article = article::with('comments')->findOrFail($id);

        return view('show', compact('article'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Simpan gambar
        if ($request->hasFile('image')) {
            $validated['image_url'] = $request->file('image')->store('articles', 'public');
        }
    
        Article::create($validated);
    
        return redirect()->back()->with('success', 'Article added successfully!');
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Perbarui data artikel
        $article->title = $validated['title'];
        $article->kategori = $validated['kategori'];
        $article->content = $validated['content'];
    
        // Jika ada gambar baru, hapus gambar lama dan unggah yang baru
        if ($request->hasFile('image')) {
            if ($article->image_url) {
                Storage::disk('public')->delete($article->image_url);
            }
            $article->image_url = $request->file('image')->store('articles', 'public');
        }
    
        $article->save();
    
        return redirect()->back()->with('success', 'Article updated successfully!');
    }

    public function destroy(article $article)
    {
        if ($article->image_url) {
            Storage::disk('public')->delete($article->image_url);
        }
        $article->delete();

        return redirect()->back()->with('success', 'Article deleted successfully.');
    }
}
