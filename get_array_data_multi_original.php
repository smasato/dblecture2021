<html>
<head><title>配列データの取得</title></head>
<body>
<table border="1">
<tr><td>id</td><td>file</td></tr>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "dblecture", "hogehoge")){
    die("MySQL接続エラー.<br />");
}
mysqli_select_db($conn, "dblecture");
$sql = "SELECT * FROM test_table2";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["id"]."</td>");
    
    $f = $row["file"];
    $g ="<td>".$f;
    if (is_file(dirname($_SERVER["SCRIPT_FILENAME"])."/".$f)) {
      // $_SERVER["SCRIPT_FILENAME"]は，Apacheで定義された
      // 定義済み変数であり，実行中のスクリプトの絶対パスを表す(pp.68表2-4)
      // dirname(x)はxのディレクトリ名を返す．
      // is_file(x)はxにファイルが存在し，普通のファイルであればtrueを返す．
      // 参照: http://www.mysql.gr.jp/jpdoc/4.0/manual.ja_toc.html

      $g .= "(<a href=\"".$f."\">すなっぷ</a>)";
    }
    $g =$g."</td>";
    print $g;
    print("</tr>\n");

}
mysqli_free_result($res);
?>
</table>
</body>
</html>
