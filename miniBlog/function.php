<?php

Class Dbc
{
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
        $dbh = $this->dbConnect();
        $sql = 'SELECT * FROM blog';
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    function getBlog($id){
        $dbh = $this->dbConnect();
        $stmt = $dbh->prepare('SELECT * FROM  blog Where id = :id');
        $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function blogCreate($blog){
        $sql = 'INSERT INTO
              blog(title, comment)
            VALUES
              (:title, :comment)';

        $dbh = $this->dbConnect();
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
  }

}

?>

