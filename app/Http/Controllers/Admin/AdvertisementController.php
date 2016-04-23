<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Advertisement;
use App\Relation;
use Validator;
use Datatables;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
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
    	return view('admin.advertisement.index');
    }

    /**
     * 数据
     *
     * @return \Illuminate\Http\Response
     */
    public function datas()
    {
    	return Datatables::of(Advertisement::query())->make(true);
    }

    /**
     * 编辑
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$advertisement = Advertisement::findOrFail($id);
        $relationDatas = Relation::whereTargetId($id)->get();
        $articleSelect2Datas = [];
        $productSelect2Datas = [];

        $articleIds = implode(',', Relation::articles($id)->lists('origin_id')->toArray());
        $productIds = implode(',', Relation::products($id)->lists('origin_id')->toArray());

        if (! $relationDatas->isEmpty()) {
            foreach ($relationDatas as $relationData) {
                if ($relationData->origin == 'articles') {
                    $articleSelect2Datas[] = [
                        'id' => $relationData->origin_id,
                        'title' => $relationData->article->title
                    ];
                } elseif ($relationData->origin == 'products') {
                    $productSelect2Datas[] = [
                        'id' => $relationData->origin_id,
                        'title' => $relationData->product->title
                    ];
                }
            }
        }

    	return view('admin.advertisement.edit')
            ->with('advertisement', $advertisement)
            ->with('articleSelect2Datas', $articleSelect2Datas)
            ->with('articleIds', $articleIds)
            ->with('productSelect2Datas', $productSelect2Datas)
            ->with('productIds', $productIds);
    }

    /**
     * 更新
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function() use($request, $id) {
        	$datas = $request->only(['banner_url', 'title', 'articles', 'products']);
            $articles = explode(',', $datas['articles']);
            $products = explode(',', $datas['products']);

            Advertisement::whereId($id)->update(['banner_url' => $datas['banner_url'], 'title' => $datas['title']]);

            Relation::whereTargetId($id)->delete();
            Relation::ofStore('articles', $articles, 'advertisements', $id);
            Relation::ofStore('products', $products, 'advertisements', $id);
        });

        return response()->json(['message' => 'Success']);
    }

    /**
     * 添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement.create');
    }

    /**
     * 保存
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function() use($request) {
            $datas = $request->only(['banner_url', 'title', 'articles', 'products']);
            $articles = explode(',', $datas['articles']);
            $products = explode(',', $datas['products']);

            $advertisement = Advertisement::create($datas);
    
            Relation::ofStore('articles', $articles, 'advertisements', $advertisement->id);
            Relation::ofStore('products', $products, 'advertisements', $advertisement->id);
        });

        return response()->json(['message' => 'Success']);
    }

    /**
     * 删除
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	DB::transaction(function() use($id) {
            Advertisement::destroy($id);
            Relation::whereTargetId($id)->delete();
        });

    	return response()->json(['message' => 'Success']);
    }

    /**
     * 启用或禁用
     *
     * @return \Illuminate\Http\Response
     */
    public function isEnableOrDisable($id)
    {
        Advertisement::where('id', '!=', $id)->update(['status' => 'disable']);
    	$advertisement = Advertisement::find($id);
		$advertisement->status == 'disable' ? $advertisement->status = 'enable' : $advertisement->status = 'disable';
		$advertisement->save();

		return response()->json(['message' => 'Success']);
    }
}
