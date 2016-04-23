<?php

namespace App\Http\Controllers\Home;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::select('id', 'title', 'created_at', 'main_image', 'infomation')
    		->orderBy('created_at', 'desc')
    		->simplePaginate(config('commont.articlesPagesize'));

    	return view('home.articles')->with('articles', $articles);
    }

    public function show($id)
    {
    	$article = Article::find($id);

    	return view('home.articles_show')->with('article', $article);
    }
}
