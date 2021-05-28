<html>
<head><title>結果リソースから情報を得る</title></head>
<body>
<table border="1">
<?php
$conn = mysqli_connect("localhost", "s1711452", "hogehoge");
mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM book_table";
$res = mysqli_query($conn, $sql);
print("<tr>");
for( $i = 0; $i < mysqli_num_fields($res); $i++ ){
    print( "<td>".mysqli_fetch_field_direct( $res, $i)->name."</td>" );
}
print("</tr>");
while($row = mysqli_fetch_array($res)){
    print("<tr>");
    for( $i = 0; $i < mysqli_num_fields($res); $i++ ){
        print( "<td>".$row[$i]."</td>" );
    }
    print("</tr>");
}
?>
</table>
</body>
</html>
