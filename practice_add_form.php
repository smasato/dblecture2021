<?php
require_once "system/util.php";
require_once "system/application_user.php";
require_once "system/practice.php";
require_once "system/score.php";
$user = current_user();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title><?php title("練習の追加"); ?></title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <h1 class="title"><?php echo("練習の追加"); ?></h1>
    <h2 class="subtitle">練習記録を追加します。</h2>
    <form action="practice_add.php" method="post">
      <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
      <div class="field">
        <label class="label">楽譜</label>
        <div class="control">
          <div class="select">
            <label>
              <select name="score_isbn" id="score_isbn">
                <?php foreach (get_scores() as $score) : ?>
                  <option value="<?php echo($score->isbn); ?>"><?php echo $score->name ?></option>
                <?php endforeach;
                unset($score); ?>
              </select>
            </label>
          </div>
        </div>
      </div>
      <div class="field">
        <label class="label">曲</label>
        <div class="control">
          <div class="select">
            <label>
              <select name="music_id" id="music_id">
                <option value=""></option>
              </select>
            </label>
          </div>
        </div>
      </div>
      <div class="field">
        <label class="label">難易度</label>
        <div class="control">
          <div class="select">
            <label>
              <select name="difficulty">
                <?php foreach ($difficulty_choices as $key => $value) : ?>
                  <option value="<?php echo($key); ?>"><?php echo $value ?></option>
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
                  <option value="<?php echo($key); ?>"><?php echo $value ?></option>
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
            <input type="date" name="start_date">
          </label>
        </div>
      </div>
      <div class="field">
        <label class="label">練習終了日</label>
        <div class="control">
          <label>
            <input type="date" name="end_date">
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    $(window).on('load', function () {
        const score_isbn = $("#score_isbn").val();
        $.getJSON("http://turkey.slis.tsukuba.ac.jp/~s1711452/api/music.php?",
            {
                isbn: score_isbn
            }
        ).done(function (data) {
                $("#music_id").empty();
                if (data) {
                    $.each(data, function (index, val) {
                        $("#music_id").append(`<option value='${val['id']}'>${val['name']}</option>`)
                    })
                }
            }
        )
    });
    $("select#score_isbn").change(function () {
        const score_isbn = $("#score_isbn").val();
        $.getJSON("http://turkey.slis.tsukuba.ac.jp/~s1711452/api/music.php?",
            {
                isbn: score_isbn
            }
        ).done(function (data) {
                $("#music_id").empty();
                if (data) {
                    $.each(data, function (index, val) {
                        $("#music_id").append(`<option value='${val['id']}'>${val['name']}</option>`)
                    })
                }
            }
        )
    })
</script>
</body>

</html>