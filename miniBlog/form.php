<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlogForm</title>
</head>
<body>
    <h2>ブログフォーム</h2>
    <form action="create.php" method="POST">
        <p>ブログタイトル：</p>
        <input type="text" name="title">
        <p>ブログコメント：</p>
        <input name="comment" id="comment">
        <br>
        <input type="submit" value="送信">
    </form>
</body>
</html>