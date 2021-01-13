<?php

$dsn = 'mysql:host=localhost;port=8889;dbname=blog_app;charset=utf8';
$user = 'root';
$pass = 'root';

// 例外処理 try~catch内の動作が確認できたらcatch以降の動作を実行
try {
  $dbh = new PDO($dsn,$user,$pass);
} catch (Exception $e) {
  var_dump($e);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

</body>
</html>