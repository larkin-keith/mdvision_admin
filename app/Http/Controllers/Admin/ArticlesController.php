<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Validator;
use Datatables;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
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
    	return view('admin.articles.index');
    }

    /**
     * 数据
     *
     * @return \Illuminate\Http\Response
     */
    public function datas()
    {
    	return Datatables::of(Article::query())->make(true);
    }

    /**
     * 编辑
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$articles = Article::findOrFail($id);

    	return view('admin.articles.edit')->with('articles', $articles);
    }

    /**
     * 更新
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$datas = $request->only(['title', 'infomation', 'content', 'main_image']);
        
    	if (Article::whereId($id)->update($datas)) {
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
        return view('admin.articles.create');
    }

    /**
     * 保存
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$datas = $request->only(['title', 'infomation', 'content', 'main_image']);

    	Article::create($datas);
    }

    /**
     * 删除
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if (Article::destroy($id)) {
    		return response()->json(['message' => 'Success']);
    	}

    	return response()->json(['message' => 'Failer'], 422);
    }
}
