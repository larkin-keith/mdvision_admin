<?php

namespace App\Http\Controllers\Home;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index() 
    {
    	$products = Product::select('id', 'title', 'created_at', 'image', 'infomation')
    		->orderBy('created_at', 'desc')
    		->simplePaginate(config('commont.productsPagesize'));

    	return view('home.products')->with('products', $products);
    }

    public function show($id)
    {
    	$product = Product::findOrFail($id);

    	return view('home.products_show')->with('product', $product);
    }
}
