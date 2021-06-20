<?php
require "system/util.php";
require "system/application_user.php";
require "system/practice.php";

$user = current_user();
$practice = get_practice($user, (int)$_POST['music_id']);

$practice->difficulty = (string)$_POST['difficulty'];
$practice->state = (string)$_POST['state'];
$practice->start_date = (string)$_POST['start_date'] == '' ? null : (string)$_POST['start_date'];
$practice->end_date = (string)$_POST['end_date'] == '' ? null : (string)$_POST['end_date'];

$res = update_practice($user, $practice);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("練習記録更新 結果") ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<?php ?>
<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <h1 class="title">練習記録更新 結果</h1>
        <?php if ($res): ?>
          <p>成功しました</p>
        <?php else: ?>
          <p>失敗しました</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>