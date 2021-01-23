<?php
// エラー文の表示
ini_set('display_errors',"On");

// エスケープ処理
function e($h){
  htmlspecialchars($h,ENT_QUOTES,'UTF-8');
}

// PDO実施(データベース接続)
$dsn = 'mysql:host=localhost;port=8889;dbname=post;charset=utf8';
$user = 'root';
$pass = 'root';

try {
  $dbh = new PDO($dsn,$user,$pass);
} catch (Exception $e) {
  var_dump($e);
}

//データの受け取り
$post = $_POST;

// バリデーション
if(empty($post['name'])){
  exit('enter name');
}

if(strlen($post['name']) > 5){
  exit('5文字以内でお願いします');
}

if(empty($post['comment'])){
  exit('enter comment');
}

if(strlen($post['comment']) > 20){
  exit('20文字以内でお願いします');
}

//データの保存

// sql文の用意 , プレースホルダー使用(SQLインジェクション対策)
$sql = 'INSERT INTO
            POST(name , comment)
          VALUES
            (:name, :comment)';

// トランザクションを用いてSQL文の実行,失敗したらロールバック
$dbh->beginTransaction();
      try {
          $stmt = $dbh->prepare($sql);
          $stmt->bindValue(':name',$post['name'],PDO::PARAM_STR);
          $stmt->bindValue(':comment',$post['comment'],PDO::PARAM_STR);
          $stmt->execute();
          $dbh->commit();
          echo '投稿に成功しました';
      } catch(Exception $e){
          $dbh->rollBack();
          exit($e);
      }

 // テーブルからデータ取得
 $sql = "SELECT * FROM `post` ORDER BY 'created_at' DESC";
 $stmt = $dbh->query($sql);
 $result = $stmt->fetchall(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
      <h1>ひとこと掲示板</h1>

      <form action="dbc.php" method="post">
            名前:    <input type="text" name="name" /><br />
            ひとこと: <input type="text" name="comment" size="60" /><br />
                    <input type="submit" name="submit" value="送信" />
      </form>
      <!-- データの中身を表示 -->
      <ul>
      <?php foreach($result as $post): ?>
          <li>
          <?php echo $post['name']; ?>
          <?php echo $post['comment']; ?>
          <?php echo $post['created_at']; ?>
          </li>
      <?php endforeach; ?>
      </ul>
    

</body>
</html>