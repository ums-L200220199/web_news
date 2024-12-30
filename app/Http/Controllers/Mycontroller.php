<?php

namespace App\Http\Controllers;
use App\Models\article;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    // Method untuk menampilkan view
    public function index()
    {
        $sliderArticles = Article::select('id', 'title', 'image_url')
            ->latest()
            ->take(6)
            ->get();

        $articles = Article::select('id', 'title', 'content', 'image_url')
            ->latest()
            ->get();
        

        return view('home', compact('sliderArticles', 'articles'), ['title' => 'Home Page']);
        
    }
    public function sport()
    {
        $sliderArticles = Article::where('kategori', 'sport') // Artikel kategori sport untuk slider
            ->select('id', 'title', 'image_url')
            ->latest()
            ->take(6)
            ->get();

        $articles = Article::where('kategori', 'sport') // Artikel kategori sport untuk konten
            ->select('id', 'title', 'content', 'image_url')
            ->latest()
            ->get();

    return view('sport', compact('sliderArticles', 'articles'), ['title' => 'Kategori Sport']);
    }
    
    public function finance()
    {
        $sliderArticles = Article::where('kategori', 'finance') // Artikel kategori finance untuk slider
            ->select('id', 'title', 'image_url')
            ->latest()
            ->take(6)
            ->get();

        $articles = Article::where('kategori', 'finance') // Artikel kategori finance untuk konten
            ->select('id', 'title', 'content', 'image_url')
            ->latest()
            ->get();

        return view('finance', compact('sliderArticles', 'articles'), ['title' => 'Kategori Finance']);
    }
    public function about()
    {
        return view('about', ['title' => 'About Us']);
    }
    
}