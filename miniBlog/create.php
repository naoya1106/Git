<?php

require_once('blog.php');
ini_set('display_errors',"On");

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

$newBlog = new Blog();
$newBlog->blogCreate($blog);

?>