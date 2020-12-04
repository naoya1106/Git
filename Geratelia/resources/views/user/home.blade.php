<!-- postできたデータを取得 →userに反映 -->
@extends('def')

@section('title','HOME')

@section('header')
    <nav class="navbar navbar-expand-lg navbar-light ">
        <h1><i class="material-icons">face</i>Gelateria</h1>
        <form class="form-inline my-2 my-lg-0">
            <div  class="user_name  mr-sm-2  ml-4"><i class="material-icons">emoji_people</i>
            <!-- セッションのユーザーキーを表示 -->
            user:{{ session('user') }}</div>
            <a href="/login" class="login_link btn btn-outline-success my-2 my-sm-0"><i class="material-icons">directions_run</i>Logout</a>
        </form>
    </nav>
@endsection

@section('intro')
    <div class='intro'>
        <p class='letter'>Let's  find  your  favorite  GelatoShop!! <i class="material-icons">sentiment_satisfied</i></p>
    </div>
@endsection


@section('images')