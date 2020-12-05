<!-- postできたデータを取得 →userに反映 -->
@extends('def')

@section('title','HOME')

@section('header')
    <nav class="navbar navbar-expand-lg navbar-light ">
        <!-- タイトルとfaceアイコン -->
        <h1><i class="material-icons">face</i>Gelateria</h1>
        <!-- ユーザー名とログアウトボタン -->
        <form class="form-inline my-2 my-lg-0">
            <!-- ユーザー名 -->
            <div  class="user_name  mr-sm-2  ml-4">
                <i class="material-icons">emoji_people</i>
                <!-- セッションのユーザーキーを表示 -->
                user:{{ session('user') }}
            </div>
            <!-- ログアウトボタン -->
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
    <!-- ラジオボタン クリックによって投稿の絞り込み -->
    <div class="select">
        <!-- <div class="account">場所で探す:</div> -->
        <form id="choice" class=''>
          <label><input type="radio" name="btn" id="a"  checked>全国</label>
          <label><input type="radio" name="btn" id="b" >東京</label>
          <label><input type="radio" name="btn" id="c" >大阪</label>
          <label><input type="radio" name="btn" id="d" >福岡</label>
        </form>
    </div>

    <!-- foreachで投稿の表示 -->
    <div class="i-wrapper ml-5">
    @foreach($images as $image)
        <div class=' pre ml-4 '>
            <!-- 店毎の画像、名前、都道府県を表示 -->
            <img src="#"  class='ge-img mb-4' width='150' height='150'>
            <div class='name'>{{ $image->shop_name }}</div>
            <div class='spot'>【{{ $image->spot }}】</div>

            <!-- 投稿の削除ボタン -->
            <form method='post' action="{{ url('/delete',$image->id) }}">
            {{ csrf_field() }}
            <input type='submit' class='delete' value='削除'>
            </form>
        </div>
        <!-- jQuelyを読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @endforeach
    </div>

@endsection
