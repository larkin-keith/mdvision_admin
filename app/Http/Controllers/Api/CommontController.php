<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommontController extends Controller
{
    public function imageUpload(Request $request)
    {
    	$destinationPath = public_path() . '/upload/';
    	$uploadPath = '/upload/';

    	if ($request->hasFile('file')) {
    		$file = $request->file('file');
    		$fileName = md5($file->getClientOriginalName().time().mt_rand(0, 9999)).'.'.$file->getClientOriginalExtension();

    		if ($file->isValid()) {
			    $file->move($destinationPath, $fileName);
			}
    	} else {
    		$fileName = '111.jpg';
    	}

    	return response()->json([
    		'fullPath' => $destinationPath . $fileName, 
    		'path' => $uploadPath . $fileName,
    		'message' => 'success'
    	]);
    }
}
