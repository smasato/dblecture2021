<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")) {
  die("データベース接続エラー.<br />");
}
mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8");

if (isset($_GET['isbn']) && $_GET['isbn'] != "") {
  $isbn = mysqli_escape_string($conn, $_GET["isbn"]);
  $isbn = str_replace("%", "\%", $isbn);

  $sql = "SELECT score.name, music.id, music.name FROM score, music where music.isbn=" . $isbn . " AND score.isbn=" . $isbn;
  $res = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_all($res, MYSQLI_NUM);
  mysqli_free_result($res);

  $score_name = $rows[0][0];
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php echo ($score_name); ?> 曲一覧 | ピアノ練習記録システム</title>
</head>

<body>
  <?php include("header.php"); ?>
  <section class="section">
    <div class="container">
      <h1 class="title"><?php echo ($score_name); ?> 曲一覧</h1>
      <h2 class="subtitle"><?php echo ($score_name); ?> に登録されている曲の一覧です。</h2>
      <table class="table is-striped is-fullwidth">
        <tr>
          <td>id</td>
          <td>曲名</td>
        </tr>
        <?php
        foreach ($rows as $row) {
          print("<tr>");
          print("<td>" . $row[1] . "</td>");
          print("<td>" . $row[2] . "</td>");
          print("</tr>");
        }
        unset($row); ?>
      </table>
    </div>
  </section>
  <footer class="footer">
    <div class="content has-text-centered">
      <p>201711452 / 杉山 将利</p>
    </div>
  </footer>
</body>

</html>