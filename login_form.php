<?php
require "./system/util.php";
require "./system/application_user.php";
$user = current_user();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("ログイン") ?></title>
</head>

<body>
<?php include("templates/header.php"); ?>
<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <h1 class="title">ログイン</h1>
        <h2 class="subtitle">利用者を選択してください。</h2>
        <form action="login.php" method="post">
          <div class="field">
            <label class="label">利用者名</label>
            <div class="control">
              <div class="select">
                <label>
                  <select name="id">
                    <?php $users = get_users(); ?>
                    <?php foreach ($users as $user) : ?>
                      <option value="<?php echo($user[0]); ?>"><?php echo $user[1] ?></option>
                    <?php endforeach; ?>
                  </select>
                </label>
              </div>
            </div>
          </div>
          <div class="control">
            <input type="submit" class="button is-primary"/>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include("templates/footer.php"); ?>
</body>

</html>