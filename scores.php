<?php
require "system/util.php";
require "system/application_user.php";
require "system/score.php";
$user = current_user();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("楽譜一覧") ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <h1 class="title">楽譜一覧</h1>
    <h2 class="subtitle">システムに登録されている楽譜の一覧です。</h2>
    <table class="table is-striped is-fullwidth">
      <tr>
        <td>楽譜名</td>
      </tr>
      <?php
      $scores = get_scores();
      foreach ($scores as $score):?>
        <tr>
          <td>
            <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/score.php?isbn=<?php echo $score[0] ?>"><?php echo $score[1] ?></a>
          </td>
        </tr>
      <?php endforeach;
      unset($score); ?>
    </table>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>