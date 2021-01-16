<?php
require_once('function.php');

Class Blog extends Dbc
{

    protected $table_name = 'blog';

    public function blogCreate($blog){
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
          $dbh->commit();
          echo '投稿に成功しました';
      } catch(Exception $e){
          $dbh->rollBack();
          exit($e);
      }
    } 

}
