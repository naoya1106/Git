<?php

function dbConnect() {
    $dsn = 'mysql:host=localhost;port=8889;dbname=blog_app;charset=utf8';
    $user = 'root';
    $pass = 'root';

    try {
      $dbh = new PDO($dsn,$user,$pass);
      // 例外時の処理
    } catch (Exception $e) {
      var_dump($e);
    }

    return $dbh;
}

function getAllBlog() {
    $dbh = dbConnect();
    $sql = 'SELECT * FROM blog';
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

function getBlog($id){
    $dbh = dbConnect();
    $stmt = $dbh->prepare('SELECT * FROM  blog Where id = :id');
    $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

?>

