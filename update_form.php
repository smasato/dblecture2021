<html>
<head><title>更新フォーム</title></head>
<body>
図書データを更新します。
<form action="library_update.php?id=<?php print( $_GET['bid'] ); ?>" method="post">
<table border="1" cellspacing="0">
<tr>
<td>ISBN番号</td>
<td><input type="text" name="isbn"></td>
</tr>
<tr>
<td>題名</td>
<td><input type="text" name="title"></td>
</tr>
<tr>
<td>著者</td>
<td><input type="text" name="auth"></td>
</tr>
<tr>
<td>出版社</td>
<td><input type="text" name="pub"></td>
</tr>
<tr>
<td>出版年</td>
<td><input type="text" name="pubyear"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="更新"></td>
</tr>
</table>
</form>
</body>
</html>
