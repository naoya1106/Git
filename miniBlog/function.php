<?php

Class Dbc
{
    protected $table_name;


    public function dbConnect() {
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

    public function getAll() {
        $dbh = $this->dbConnect();
        $sql = "SELECT * FROM $this->table_name";
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getById($id){

        $dbh = $this->dbConnect();
        $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id");
        $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


}

?>

