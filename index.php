<?php
require_once "system/application_user.php";

$user = current_user();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title>ピアノ練習記録システム</title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <div class="block">
      <h2 class="subtitle is-3">各スクリプトへのリンク</h2>
      <ul>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/tables/application_user.php">application_user</a></li>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/tables/score.php">score</a></li>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/tables/music.php">music</a></li>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/tables/practice.php">practice</a></li>
      </ul>
    </div>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>