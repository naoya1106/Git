<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    public function login(){
        (session('user'));
        return view('user.login');
    }


    public function reg(){
        return view('user.reg');
    }

     //ログイン用 enterアクション
     public function enter(Request $request){
        //nameカラムをセッションのuserキーに代入、
        session(['user' => $request->name,]);
        // 店の一覧を取得
        $images = Image::all();
        return view('user.home',compact('images'));
    }

    //新規登録用 storeアクション
    // フォームリクエストを適用
    public function store(UserRequest $request){

        $user = new User();
        $user->name = $request -> name;
        $user->mail = $request -> mail;
        $user->pass = $request -> pass;
        $user->save();
        // セッションにユーザー名を保存
        session(['user' => $request->name,]);
        // 店の一覧を取得
        $images = Image::all();
        return view('user.home',compact('images'));
    }

}