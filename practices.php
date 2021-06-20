<?php
require "system/util.php";
require "system/application_user.php";
require "system/practice.php";
$user = current_user();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("練習") ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column">
        <h1 class="title">練習</h1>
        <h2 class="subtitle">練習の一覧です。</h2>
        <table class="table is-striped is-fullwidth">
          <tr>
            <td>楽譜名</td>
            <td>曲名</td>
            <td>難易度</td>
            <td>状態</td>
            <td>練習開始日</td>
            <td>練習終了日</td>
            <td>編集</td>
          </tr>
          <?php
          $practices = get_practices_by_user($user);
          foreach ($practices as $practice): ?>
            <tr>
              <?php /** @var Practice $practice */ ?>
              <td><?php echo $practice->music()->score()->name ?></td>
              <td><?php echo $practice->music()->name ?></td>
              <td><?php echo $practice->difficulty_value() ?></td>
              <td><?php echo $practice->state_value() ?></td>
              <td><?php echo $practice->start_date ?></td>
              <td><?php echo $practice->end_date ?></td>
              <td>
                <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/practice_edit_form.php?music_id=<?php echo $practice->music()->id ?>">編集</a>
              </td>
            </tr>
          <?php endforeach;
          unset($practice); ?>
        </table>
      </div>
    </div>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>