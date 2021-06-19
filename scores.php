<?php
require "system/util.php";
require "system/application_user.php";
$user = current_user();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("楽譜一覧") ?></title>
</head>

<body>
<?php include("templates/header.php"); ?>
<section class="section">
  <div class="container">
    <h1 class="title">楽譜一覧</h1>
    <h2 class="subtitle">システムに登録されている楽譜の一覧です。</h2>
    <table class="table is-striped is-fullwidth">
      <tr>
        <td>楽譜名</td>
      </tr>
      <?php
      # TODO: 関数化する
      $table_name = "score";
      $host = "localhost";
      if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")) {
        die("MySQL接続エラー.<br />");
      }
      mysqli_select_db($conn, "s1711452");
      $sql = "SELECT * FROM ${table_name}";
      $res = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($res)) {
        print("<tr>");
        print("<td><a href=\"http://turkey.slis.tsukuba.ac.jp/~s1711452/score.php?isbn=" . $row["isbn"] . "\">" . $row["name"] . "</a></td>");
        print("</tr>\n");
      }
      mysqli_free_result($res);
      ?>
    </table>
  </div>
</section>
<?php include("templates/footer.php"); ?>
</body>

</html>