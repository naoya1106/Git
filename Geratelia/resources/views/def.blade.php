<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- asset = publicディレクトリのパスを返す関数 -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>

    <header>
      @yield('header')
    </header>

    <div class="intro" >
      @yield('intro')
    </div>

     <div class="form" >
      @yield('form')
     </div>

    <div class="images" >
      @yield('images')
    </div>

    <footer>
        <div class="footer text-center">
              <p class="text-center">naoya 2021</p>
        </div>
    </footer>

</body>
</html>