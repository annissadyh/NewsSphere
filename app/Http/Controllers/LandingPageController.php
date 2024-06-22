<?php

namespace App\Http\Controllers;

use App\Models\Article;    
use App\Models\Kategori;    
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $categories = Kategori::all();
        $articles = Article::all();
        $latestArticle = Article::orderBy('created_at', 'DESC')->take(3)->get();
        
        return view('landingpage.home', compact('categories', 'articles', 'latestArticle'));
    }

    public function filterByCategory($slug)
    {
        $categories = Kategori::all();
        $category = Kategori::where('slug', $slug)->firstOrFail();
        $articles = Article::where('category_id', $category->id)->get();
        $latestArticle = Article::orderBy('created_at', 'DESC')->take(3)->get();

        return view('landingpage.home', compact('categories', 'articles', 'latestArticle'));
    }

    public function detail($slug)
    {
        $categories = Kategori::all();
        $article = Article::where('slug', $slug)->firstOrFail();
        $postinganTerbaru = Article::orderBy('created_at', 'DESC')->limit(5)->get();

        return view('landingpage.article.detail-article', compact('categories', 'article', 'postinganTerbaru'));
    }
}
