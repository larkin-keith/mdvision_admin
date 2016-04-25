<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Validator;
use Datatables;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * 首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('admin.products.index');
    }

    /**
     * 数据
     *
     * @return \Illuminate\Http\Response
     */
    public function datas()
    {
    	return Datatables::of(Product::query())->make(true);
    }

    /**
     * 编辑
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$products = Product::findOrFail($id);

    	return view('admin.products.edit')->with('products', $products);
    }

    /**
     * 更新
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$datas = $request->only(['title', 'infomation', 'image', 'content']);
        
    	if (Product::whereId($id)->update($datas)) {
    		return response()->json(['message' => 'Success']);
    	}

    	return response()->json(['message' => 'Failer'], 422);
    }

    /**
     * 添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * 保存
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$datas = $request->only(['title', 'infomation', 'image', 'content']);

    	Product::create($datas);
    }

    /**
     * 删除
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if (Product::destroy($id)) {
    		return response()->json(['message' => 'Success']);
    	}

    	return response()->json(['message' => 'Failer'], 422);
    }
}
