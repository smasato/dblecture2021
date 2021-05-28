<html>
<head><title>配列データの取得</title></head>
<body>
<table border="1">
<tr><td>id</td><td>file</td></tr>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")){
    die("MySQL接続エラー.<br />");
}
mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8"); //utf8コードの利用にはこれが必要
$sql = "SELECT * FROM test_table2";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["id"]."</td>");
    print("<td><img src=\"".$row["file"]."\"/></td>");
    print("</tr>\n");
}
mysqli_free_result($res);
?>
</table>
</body>
</html>
