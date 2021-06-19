<?php require("util.php"); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <?php title("利用者登録 結果") ?>
</head>

<body>
  <?php include("header.php"); ?>
  <?php ?>
  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-one-third">
          <h1 class="title">利用者登録</h1>
          <?php
          if (user_exits($_POST["name"])) {
            echo "<p class=\"has-text-danger\">同名のユーザーが存在します</p>";
          } else {
            $res = user_register($_POST["name"])[0]; ?>
            <p>利用者登録が成功しました。</p>
            <p>利用者名: <?php echo $res[1]; ?></p>
            <p>利用者ID: <?php echo $res[0]; ?></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <?php include("footer.php"); ?>
</body>

</html>