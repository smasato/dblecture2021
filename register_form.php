<?php
require "system/util.php";
$user = null; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("利用者登録") ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <h1 class="title">利用者登録</h1>
        <h2 class="subtitle">システムの利用者登録ができます。</h2>
        <form action="register.php" method="post">
          <div class="field">
            <label class="label">利用者名</label>
            <div class="control">
              <label>
                <input class="input" type="text" name="name" required>
              </label>
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
<?php include "templates/footer.php"; ?>
</body>

</html>