<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use Validator;
use Datatables;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{   
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

    	return view('admin.advertisement.edit')->with('advertisement', $advertisement);
    }

    /**
     * 更新
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$datas = $request->only(['banner_id', 'title', 'carousels', 'articles', 'products']);

        // $datas['carousels'] = json_encode($datas['carousels']);
        $datas['articles'] = json_encode($datas['articles']);
        $datas['products'] = json_encode($datas['products']);

    	if (Advertisement::whereId($id)->update($datas)) {
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
        return view('admin.advertisement.create');
    }

    /**
     * 保存
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$datas = $request->only(['banner_id', 'title', 'carousels', 'articles', 'products']);
        $datas['status'] = "disable";

    	Advertisement::create($datas);
    }

    /**
     * 删除
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if (Advertisement::destroy($id)) {
    		return response()->json(['message' => 'Success']);
    	}

    	return response()->json(['message' => 'Failer'], 422);
    }

    public function isEnableOrDisable($id)
    {
        Advertisement::where('id', '!=', $id)->update(['status' => 'disable']);
    	$advertisement = Advertisement::find($id);
		$advertisement->status == 'disable' ? $advertisement->status = 'enable' : $advertisement->status = 'disable';
		$advertisement->save();

		return response()->json(['message' => 'Success']);
    }
}
