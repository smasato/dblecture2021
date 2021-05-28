<html>
<head><title>配列データの取得</title></head>
<body>
<table border="1">
<tr><td>題名</td><td>著者</td><td>出版社</td></tr>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")){
    die("MySQL接続エラー.<br />");
}
mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM book_table LIMIT 10";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["btitle"]."</td>");
    print("<td>".$row["bauth"]."</td>");
    print("<td>".$row["bpub"]."</td>");
    print("</tr>\n");
}
mysqli_free_result($res);
?>
</table>
</body>
</html>
