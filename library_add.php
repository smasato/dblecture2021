<html>
<head><title>データの追加</title></head>
<body>
<?php
$isbn = $_POST['isbn'];
if ($isbn == "") {
    exit("isbnが入力されていません");
}
$title = $_POST['title'];
if ($title == ""){
    exit ("タイトルが入力されていません");
}
$auth = $_POST['auth'];
if ($title == ""){
    exit ("著者が入力されていません");
}
$pub = $_POST['pub'];
if ($pub == ""){
    exit ("出版社が入力されていません");
}
$pubyear = $_POST['pubyear'];
if ($title == ""){
    exit ("出版年が入力されていません");
}

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")){
    die("データベース接続エラー.<br />");
}

mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8");
    
$sql = "INSERT INTO book_table(bisbn, btitle, bauth, bpub, bpubyear) VALUES('$isbn', '$title', '$auth', '$pub', '$pubyear')";

mysqli_query($conn, $sql)
   or die("登録できませんでした");
print("登録しました。<a href=\"search_form.html\">search_form.html</a>で確認してください。");
?>
</body>
</html>
