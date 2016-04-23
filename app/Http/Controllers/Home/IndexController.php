<?php

namespace App\Http\Controllers\Home;

use App\Advertisement;
use App\Relation;
use App\Article;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	$advertisements = Advertisement::select('id', 'banner_url')->enable()->first();

    	$articles = '';
    	$products = '';

    	if ($advertisements) {
	    	$articles = Relation::articles($advertisements->id)->get();
	    	$products = Relation::products($advertisements->id)->get();
    	}
    	// dd($)
    	return view('home.index')
    		->with('advertisements', $advertisements)
    		->with('articles', $articles)
    		->with('products', $products);
    }
}
