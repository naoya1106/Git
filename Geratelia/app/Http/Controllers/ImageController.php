<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //投稿の削除
    public function delete($id){
        //idから投稿を検索→変数に代入
        $del = \App\image::find($id);
        //　!empty＝投稿が存在→削除
        if(!empty($del)){
            $del -> delete();
        }
        //投稿を再取得して渡す
        $images = \App\image::all();
        return view('user.home',compact('images'));
    }

    public function add(Request $request){
        // dd($request->file('path'))
        //変数作成,各カラムを代入
        $image = [
        'shop_name' => $request->shop_name,
        'spot'  => $request->spot,
        'path'  => $request->path
        ];
        // dd($image);
        \DB::table('images')->insert($image);

        $images = \App\Image::all();
        return view('user.home',compact('images'));
   }


}
