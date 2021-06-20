<?php
require "system/util.php";
require "system/application_user.php";
require "system/practice.php";
$user = current_user();

$practice = get_practice($user->id, $_GET['music_id']);
$music = $practice->music();
$score = $practice->music()->score();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("$score->name $music->name"); ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <h1 class="title"><?php echo("$score->name $music->name"); ?></h1>
    <h2 class="subtitle"><?php echo("$score->name $music->name"); ?> の練習記録を編集します。</h2>
    <form action="practice_edit.php" method="post">
      <div class="field">
        <label class="label">難易度</label>
        <div class="control">
          <div class="select">
            <label>
              <select name="difficulty">
                <?php foreach ($difficulty_choices as $key => $value) : ?>
                  <?php if ($practice->difficulty == $key): ?>
                    <option value="<?php echo($key); ?>" selected><?php echo $value ?></option>
                  <?php else: ?>
                    <option value="<?php echo($key); ?>"><?php echo $value ?></option>
                  <?php endif; ?>
                <?php endforeach;
                unset($key, $value); ?>
              </select>
            </label>
          </div>
        </div>
      </div>
      <div class="field">
        <label class="label">状態</label>
        <div class="control">
          <div class="select">
            <label>
              <select name="state">
                <?php foreach ($state_choices as $key => $value) : ?>
                  <?php if ($practice->state == $key): ?>
                    <option value="<?php echo($key); ?>" selected><?php echo $value ?></option>
                  <?php else: ?>
                    <option value="<?php echo($key); ?>"><?php echo $value ?></option>
                  <?php endif; ?>
                <?php endforeach;
                unset($key, $value); ?>
              </select>
            </label>
          </div>
        </div>
      </div>
      <div class="field">
        <label class="label">練習開始日</label>
        <div class="control">
          <label>
            <?php if (is_null($practice->start_date)): ?>
              <input type="date" name="start_date">
            <?php else: ?>
              <input type="date" name="start_date" value="<?php echo $practice->start_date ?>">
            <?php endif; ?>
          </label>
        </div>
      </div>
      <div class="field">
        <label class="label">練習終了日</label>
        <div class="control">
          <label>
            <?php if (is_null($practice->end_date)): ?>
              <input type="date" name="end_date">
            <?php else: ?>
              <input type="date" name="end_date" value="<?php echo $practice->end_date ?>">
            <?php endif; ?>
          </label>
        </div>
      </div>
      <div class="control">
        <input type="submit" class="button is-primary"/>
      </div>
    </form>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>