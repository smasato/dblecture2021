<html>
<head><title>データの更新</title></head>
<body>
<?php
$id = $_GET['id'];

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")){
    die("データベース接続エラー<br />");
}
mysqli_select_db($conn, "s1711452");
mysqli_set_charset($conn, "utf8");

$item = "";

$isbn = $_POST['isbn'];
if($isbn != ""){
    $isbn = str_replace("%", "\%", mysqli_escape_string($conn, $isbn));
    $item = "bisbn='$isbn'";
}

$title = $_POST['title'];
if($title != ""){
    $title = str_replace("%", "\%", mysqli_escape_string($conn, $title));
    if($item == ""){
        $item = "btitle='$title'";
    }else{
        $item .= ", btitle='$title'";
    }
}

$auth = $_POST['auth'];
if($auth != ""){
    $auth = str_replace("%", "\%", mysqli_escape_string($conn, $auth));
    if($item == ""){
        $item = "bauth='$auth'";
    }else{
        $item .= ", bauth='$auth'";
    }
}

$pub = $_POST['pub'];
if($pub != ""){
    $pub = str_replace("%", "\%", mysqli_escape_string($conn, $pub));
    if($item == ""){
        $item = "bpub='$pub'";
    }else{
        $item .= ", bpub='$pub'";
    }
}

$pubyear = $_POST['pubyear'];
if($pubyear != ""){
    $pubyear = str_replace("%", "\%", mysqli_escape_string($conn, $pubyear));
    if($item == ""){
        $item = "bpubyear='$pubyear'";
    }else{
        $item .= ", bpubyear='$pubyear'";
    }
}
if ($pubyear <= 1970) {
    print("error");
} else {
    $sql = "UPDATE book_table SET ".$item." WHERE bid='$id'";
    mysqli_query($conn, $sql)
    or die("更新できませんでした");
    print("更新しました。<a href=\"search_form.html\">search_form.html</a>で確認してください。");
}
?>
</body>
</html>
