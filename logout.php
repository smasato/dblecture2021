<?php require "system/util.php"; ?>
<?php require "system/application_user.php";
$user = null;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <meta http-equiv="refresh" content="1;URL=http://turkey.slis.tsukuba.ac.jp/~s1711452/index.php">
  <title><?php title("ログアウト") ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<?php ?>
<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <h1 class="title">ログアウト</h1>
        <?php user_logout(); ?>
        <p>ログアウトしました。</p>
        <p>1秒後にトップページにリダイレクトします。</p>
      </div>
    </div>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>