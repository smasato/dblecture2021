<html>
<head><titleファイルデータの追加</title></head>
<body>
<?php
//============== dbに接続 ================


$host = "localhost";
if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")){
    die("データベース接続エラー.<br />");
}

mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8");


//============  upload =================

//拡張子を取得
$upfilename =$_FILES['upfile']['name'];
print ($upfilename);
$pos = strrpos($upfilename,".");
$ext = substr($upfilename,$pos+1,strlen($upfilename)-$pos);


// 新しいidを入手
$sql="select max(id) as max_id from test_table2"; // 現在最大のid
$r=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($r);
$id=$row["max_id"]+1; // 新しいid=現在最大のid+1

//idと拡張子から新しいファイル名を作る
$filename="img/".$id.".".$ext;

print ($filename);
// uploadの実行
if (move_uploaded_file($_FILES['upfile']['tmp_name'], $filename) == FALSE){
    print("Upload failed...");
    print($_FILES['upfile']['error']);
}else {
    print("<b>" . $filename . "</b> uploaded!");
}

// dbに登録

$sql = "INSERT INTO test_table2(id, file) VALUES($id, '$filename')";

mysqli_query($conn, $sql) or die("登録できませんでした");
print("登録しました");
print("<a href='get_array_data_multi_2.php'>get_array_data_multi_2.php</a>を見てください</a>");
?>
</body>
</html>
