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

  <?php
  if ($_POST) {
    $title = $_POST["title"];
    $tantou = $_POST["tantou"];
    $body = $_POST["body"];

    if (isset($title) && $title != "" &&
      isset($tantou) && $tantou != "" &&
      isset($body) && $body != "") {
      $mysqli = new mysqli("localhost", "s1711452", "hogehoge", "s1711452");
      $mysqli->set_charset("utf8");
      $sql = "INSERT INTO keiji(title, tantou, body)
    VALUES('$title','$tantou', '$body');";
      $res = $mysqli->query($sql)
      or die("登録できませんでした。");
      print("登録しました");
    }
  }
  ?>

  <form action="add_board.php" method="post">
    <table border="1">
      <tr>
        <td>タイトル</td>
        <td><input type="text" name="title"></td>
      </tr>
      <tr>
        <td>投稿者</td>
        <td><input type="text" name="tantou"></td>
      </tr>
      <tr>
        <td>本文</td>
        <td><textarea name="body"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="submit" value="追加"></td>
      </tr>
    </table>
  </form>

  <footer class="bg-gray-700 p-6">
    <p class="text-white">
      <strong>TSUINS</strong>&nbsp;<span class="text-gray-500">201711452 杉山 将利</span>
    </p>
  </footer>
</div>

</body>

</html>
