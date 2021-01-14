<?php 

require_once('function.php');

$blogData = getAllBlog();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>ミニブログ</title>
</head>
<body>
<h1>blog</h1>
名前: <input type="text" name="name" /><br />
ひとこと: <input type="text" name="comment" size="60" /><br />
<input type="submit" name="submit" value="送信" />
</form>

<table>
  <tr>
      <th>No</th><th>title</th><th>comment</th><th>time</th> 
  </tr>
  <?php foreach($blogData as $column) ?> 
  <tr>
      <td><?php echo $column['id'] ?></td>
      <td><?php echo $column['title'] ?></td>
      <td><?php echo $column['comment'] ?></td>
      <td><?php echo $column['time'] ?></td>
      <td><a href='detail.php?id=<?php echo $column['id']?>'>詳細</a></td>
  </tr>
</table>

</body>
</html>
