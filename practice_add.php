<?php
require_once "system/util.php";
require_once "system/application_user.php";
require_once "system/practice.php";

$user = current_user();

$music_id = (string)$_POST['music_id'];
$difficulty = (string)$_POST['difficulty'];
$state = (string)$_POST['state'];
$start_date = (string)$_POST['start_date'] == '' ? null : (string)$_POST['start_date'];
$end_date = (string)$_POST['end_date'] == '' ? null : (string)$_POST['end_date'];

$res = create_practice($user, new Practice($user->id, $music_id, $difficulty, $state, $start_date, $end_date));
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("練習記録追加 結果") ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <h1 class="title">練習記録追加 結果</h1>
        <?php if ($res): ?>
          <p>練習の追加に成功しました</p>
        <?php else: ?>
          <p>練習の追加に失敗しました</p>
        <?php endif; ?>
        <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/practices.php">練習一覧</a>
      </div>
    </div>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>