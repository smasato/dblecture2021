<html>
<head><title>while_break.php</title></head>
<body>
<?php
$a=0;
while ($a <= 5) {
    print ($a."<br />");
    $a++;
    if ($a == 3)
    break;
}
?>
</body>
</html>