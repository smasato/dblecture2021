<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>データ工学概論</title>
</head>

<body>
<div class="min-h-screen flex flex-col">
  <?php include("./template/header.php"); ?>

  <button href="./add_board.php">掲示を追加する</button>

  <?php
  $mysqli = new mysqli("localhost", "s1711452", "hogehoge", "s1711452");
  $mysqli->set_charset("utf8");
  $sql = "SELECT * from keiji";
  $res = $mysqli->query($sql);
  ?>

  <div>
    <?php while ($row = $res->fetch_array()) : ?>
      <div>
        <h1><?php echo $row["title"]; ?></h1>
        <h2>投稿者: <?php echo $row["tantou"]; ?> 投稿日: <?php echo $row["published"]; ?></h2>
        <p><?php echo $row["body"]; ?></p>
      </div>
    <?php endwhile; ?>
  </div>

  <footer class="bg-gray-700 p-6">
    <p class="text-white">
      <strong>TSUINS</strong>&nbsp;<span class="text-gray-500">201711452 杉山 将利</span>
    </p>
  </footer>
</div>

</body>

</html>
