<html>
<head><title>先に実行した問合せの結果を利用した問合せ</title></head>
<body>
<?php
$id = $_GET['bid'];

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")){
    die("データベース接続エラー<br />");
}
mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8");


$sql = "select * from book_table  WHERE bid!='".$id."'";
$res=mysqli_query($conn, $sql);

print("<table border=\"1\">");
print("<tr><td>bid</td><td>ISBNコード</td><td>題名</td><td>著者</td><td>出版社</td><td>出版年</td></tr>");
while ($row=mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["bid"]."</td>");
    print("<td>".$row["bisbn"]."</td>");
    print("<td>".$row["btitle"]."</td>");
    print("<td>".$row["bauth"]."</td>");
    print("<td>".$row["bpub"]."</td>");
    print("<td>".$row["bpubyear"]."</td>");
}
    print("</tr>");

print("</table>");

?>
</body>
</html>
