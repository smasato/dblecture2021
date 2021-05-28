<html>
<head><title>tax.php</title></head>
<body>
<?php
function tax($zeikomi) {
    $zeinuki = $zeikomi / 1.05;
    return $zeinuki;
}
print (tax(105));
?>
</body>
</html>
