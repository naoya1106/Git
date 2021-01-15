<?php

require_once('function.php');

$blog = $_POST;

if(empty($blog['title'])){
  exit('enter title');
}

if(mb_strlen($blog['title']) > 10){
  exit('titleは10文字以下');
}

if(empty($blog['comment'])){
  exit('enter comment');
}

$sql = 'INSERT INTO
          blog(title, comment)
        VALUES
          (:title, :comment)';

$dbh = dbConnect();
$dbh->beginTransaction();
try {
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':title',$blog['title'],PDO::PARAM_STR);
    $stmt->bindValue(':comment',$blog['comment'],PDO::PARAM_STR);
    $stmt->execute();
    echo ブログを投稿しました;
    $dbh->commit();
} catch(Exception $e){
    $dbh->rollBack();
    exit($e);
}

?>