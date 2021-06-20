<?php
require_once "system/application_user.php";

$user = current_user();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  <title>ピアノ練習記録システム</title>
</head>

<body>
<?php include "templates/header.php"; ?>
<section class="section">
  <div class="container">
    <div class="block">
      <h2 class="subtitle is-3">システムの使い方</h2>
      <ol>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/register_form.php">利用者登録</a>をしてください</li>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/login_form.php">ログイン</a>をしてください</li>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/practices.php">練習</a>で記録できます</li>
      </ol>
    </div>
    <div class="block">
      <h2 class="subtitle is-3">各テーブルを表示するスクリプトへのリンク</h2>
      <ul>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/tables/application_user.php">application_user</a></li>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/tables/score.php">score</a></li>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/tables/music.php">music</a></li>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/tables/practice.php">practice</a></li>
      </ul>
    </div>
    <div class="block">
      <h2 class="subtitle is-3">サイト構成</h2>
      <a href="https://github.com/smasato/dblecture2021">ソースコード(GitHub)</a>
      <pre>public_html
├── api
│   └── music.php
├── debug.php
├── index.html
├── index.php
├── login.php
├── login_form.php
├── logout.php
├── practice_add.php
├── practice_add_form.php
├── practice_edit.php
├── practice_edit_form.php
├── practices.php
├── register.php
├── register_form.php
├── score.php
├── scores.php
├── system
│   ├── application_user.php
│   ├── db.php
│   ├── music.php
│   ├── practice.php
│   ├── score.php
│   └── util.php
├── tables
│   ├── application_user.php
│   ├── music.php
│   ├── practice.php
│   └── score.php
└── templates
    ├── footer.php
    └── header.php</pre>
    </div>
    <div class="block">
      <h2 class="subtitle is-3">リンク</h2>
      <ul>
        <li><a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/s1711452-f-Sugiyama-Masato.pptx">s1711452-f-Sugiyama-Masato.pptx</a></li>
      </ul>
    </div>
  </div>
</section>
<?php include "templates/footer.php"; ?>
</body>

</html>