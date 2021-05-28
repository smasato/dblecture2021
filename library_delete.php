<html>
<head><title>データの削除</title></head>
<body>
<?php
$id = $_GET['bid'];

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")){
    die("データベース接続エラー.<br />");
}
mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8");

$sql = "DELETE FROM book_table WHERE bid='$id'";
mysqli_query($conn, $sql)
    or die("削除できませんでした");
print("削除しました。<a href=\"search_form.html\">search_form.html</a>で確認してください。");
?>
</body>
</html>
