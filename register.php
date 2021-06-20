<?php require_once "system/util.php"; ?>
<?php require_once "system/application_user.php";
$user = null;
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
<?php include "templates/header.php"; ?>
<?php ?>
<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <div class="content">
          <h1 class="title">利用者登録</h1>
          <?php
          if (user_exits_by_name($_POST["name"])): ?>
            <div class="block">
              <p class="has-text-danger">同名のユーザーが存在します。</p>
            </div>
          <?php else:
            $user = user_register($_POST["name"]); ?>
            <div class="block">
              <p class="has-text-success">利用者登録が成功しました。</p>
              <p>利用者名: <?php echo $user->name; ?></p>
              <p>利用者ID: <?php echo $user->id; ?></p>
            </div>
            <p><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/login_form.php">ログイン</a>ページでログインできます。</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>