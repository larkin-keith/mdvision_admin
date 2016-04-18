<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	/**
     * 文章搜索
     *
     * @return \Illuminate\Http\Response
     */
    public function articles(Request $request)
    {
    	$results = ['items' => [], 'total_count' => 0];
    	if ($request->has('q')) {
    		$query = Article::where('title', 'like', '%'. $request->get('q') .'%');
    		$items = $query->get();
    		$totalCount = $query->count();
    		$results = ['items' => $items, 'total_count' => $totalCount];
    	}

    	return response()->json($results);
    }

    /**
     * 产品搜索
     *
     * @return \Illuminate\Http\Response
     */
    public function products(Request $request)
    {
    	$results = ['items' => [], 'total_count' => 0];
    	if ($request->has('q')) {
    		$query = Product::where('title', 'like', '%'. $request->get('q') .'%');
    		$items = $query->get();
    		$totalCount = $query->count();
    		$results = ['items' => $items, 'total_count' => $totalCount];
    	}

    	return response()->json($results);
    }
}
