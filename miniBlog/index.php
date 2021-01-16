<?php

require_once('blog.php');
ini_set('display_errors',"On");

$blog = new Blog('blog');

$blogData = $blog->getAll();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>ミニブログ一覧</title>
<body>

<h2>ミニブログ一覧</h2>
<p><a href="form.php">新規作成</a></p>
<table>
  <tr>
      <th>No</th><th>title</th><th>comment</th><th>time</th> 
  </tr>
  <?php foreach($blogData as $column): ?> 
  <tr>
      <td><?php echo $column['id'] ?></td>
      <td><?php echo $column['title'] ?></td>
      <td><?php echo $column['comment'] ?></td>
      <td><?php echo $column['time'] ?></td>
      <td><a href='detail.php?id=<?php echo $column['id']?>'>詳細</a></td>
  </tr>
  <?php endforeach; ?>
</table>

</body>
</html>
