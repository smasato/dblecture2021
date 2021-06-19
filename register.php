<?php require "system/util.php"; ?>
<?php require "system/application_user.php";
$user = NULL;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("利用者登録 結果") ?></title>
</head>

<body>
<?php include("templates/header.php"); ?>
<?php ?>
<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <h1 class="title">利用者登録</h1>
        <?php
        if (user_exits_by_name($_POST["name"])): ?>
          <p class="has-text-danger">同名のユーザーが存在します。</p>
        <?php else:
          $res = user_register($_POST["name"])[0]; ?>
          <p>利用者登録が成功しました。</p>
          <p>利用者名: <?php echo $res[1]; ?></p>
          <p>利用者ID: <?php echo $res[0]; ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>