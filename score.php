<?php
require "system/util.php";
require "system/application_user.php";
require "system/music.php";
$user = current_user();

$score = get_score_by_isbn($_GET['isbn']);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("$score->name 曲一覧"); ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <h1 class="title"><?php echo($score->name); ?> 曲一覧</h1>
    <h2 class="subtitle"><?php echo($score->name); ?> に登録されている曲の一覧です。</h2>
    <table class="table is-striped is-fullwidth">
      <tr>
        <td>曲名</td>
      </tr>
      <?php
      foreach ($score->musics() as $music): ?>
        <tr>
          <?php /** @var Music $music */ ?>
          <td><?php echo $music->name ?></td>
        </tr>
      <?php endforeach;
      unset($music); ?>
    </table>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>