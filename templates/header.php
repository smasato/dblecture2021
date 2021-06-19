<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/index.html" class="navbar-item">ピアノ練習記録システム</a>
  </div>
  <div class="navbar-menu">
    <div class="navbar-start">
      <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/index.html" class="navbar-item">Top</a>
      <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/scores.php" class="navbar-item">楽譜</a>
    </div>
    <div class="navbar-end">
      <?php if ($user == NULL): ?>
        <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/register_form.php" class="navbar-item">利用者登録</a>
        <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/login_form.php" class="navbar-item">ログイン</a>
      <?php else: ?>
        <span class="navbar-item">ログイン中&nbsp;<b><?php echo $user[1]; ?></b></span>
        <a href="http://turkey.slis.tsukuba.ac.jp/~s1711452/logout.php" class="navbar-item">ログアウト</a>
      <?php endif; ?>

    </div>
  </div>
</nav>