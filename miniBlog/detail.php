<?php

require_once('function.php');

$dbc = new Dbc();

$result = $dbc->getBlog($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ詳細</title>
</head>
<body>
  <h1>ブログ詳細</h1>
  <p>title: <?php echo $result['title'] ?></p>
  <p>comment: <?php echo $result['comment'] ?></p>
  <p>time: <?php echo $result['time'] ?></p>
</body>
</html>
