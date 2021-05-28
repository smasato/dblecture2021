<html>
<head><title>global.php</title></head>
<body>
<?php
$a = 1;
function gtest(){
    global $a;
    print ($a+1);
}
gtest();
?>
</body>
</html>
