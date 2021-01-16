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

$dbc = new Dbc();
$dbc->blogCreate($blog);

?>