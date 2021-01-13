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
        <div class="account">場所で探す:</div>
        <form id="choice" class=''>
          <label><input type="radio" name="btn" id="a"  checked>全国</label>
          <label><input type="radio" name="btn" id="b" >東京</label>
          <label><input type="radio" name="btn" id="c" >大阪</label>
          <label><input type="radio" name="btn" id="d" >福岡</label>
        </form>
    </div>

    <div class="i-wrapper ml-5">
    @foreach($images as $key => $image)
        <!-- インスタンスを表示 -->
        <!-- config/const.phpに定数LOCATIONを設定 -->
            <div class='instance {{ LOCATION [$image->spot] }} mr-3 mb-2 @if ( $key === 1 ) order @endif'>
                <div class=' pre ml-4 '>
                    <!-- 店毎の名前、都道府県、画像を表示 -->
                    <img src=" {{ asset( 'storage/'.$image->path ) }}"  class='ge-img mb-4' width='150' height='150'>
                    <div class='name'>{{ $image->shop_name }}</div>
                    <div class='spot'>【{{ $image->spot }}】</div>

                    <form method='post' action="{{ url('/delete',$image->id) }}">
                    {{ csrf_field() }}
                    <input type='submit' class='delete' value='削除'>
                    </form>
                </div>
            </div>
        <!-- jQuelyを読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- JSを読み込み -->
        <script src=" {{ asset('js/main.js') }}"></script>
    @endforeach
    </div>

    <div class="add_form">
        <!-- 店追加フォーム -->
        <h4><i class="material-icons">note_add</i>店情報の追加</h4>
        <form  method='post' action="{{ url('/add') }}" class="was-validated" enctype='multipart/form-data'>
            {{ csrf_field() }}
          店名：<input type="text" name='shop_name'>
          <div class="mb-3">
            <div class="input-group is-invalid">
              <div class="input-group-prepend prefect mt-2">
                <label class="input-group-text" for="validatedInputGroupSelect">都道府県 ： </label>
              </div>
              <select name='spot' class="custom-select mt-2" required>
                <option value="">選ぶ</option>
                <option value="東京">東京</option>
                <option value="大阪">大阪</option>
                <option value="福岡">福岡</option>
              </select>
            </div>
          </div>

          <input type="file" class="form-control" name="path" style='display:inline'>
          <input type="submit" value='追加' class='mt-3 mb-2' style='display:inline'>
        </form>
    </div>

@endsection


