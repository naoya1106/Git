<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //投稿の削除
    public function delete($id){
        //idから投稿を検索→変数に代入
        $del = \App\image::find($id);
        // empty＝投稿が存在→削除
        if(!empty($del)){
            $del -> delete();
        }
        //投稿を再取得して渡す
        $images = \App\image::all();
        return view('user.home',compact('images'));
    }

        public function add(Request $request){
            // 変数にpathカラムを代入
            // 引数にpublicを設定 → storage/app/public/に保存
            // (storeメソッドのデフォルト空間はstorage/app/)
            $path = $request->path->store('public');
            // →シンボリックリンク(public/storage)にも保存が反映

            //変数作成,各カラムを代入
            $image = [
            'shop_name' => $request->shop_name,
            'spot'  => $request->spot,
            //$pathをパスに指定
            'path'  => basename($path)
            ];
            // dd($image);
            \DB::table('images')->insert($image);

            $images = \App\Image::all();
            return view('user.home',compact('images'));
    }

}
