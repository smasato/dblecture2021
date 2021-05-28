<html>
<head><title>foreach.php</title></head>
<body>
<?php
$color3=array(0=>'red', 1=>'green', 2=>'blue', 4=>'yellow');
for ($i = 0, $size = count($color3); $i < $size; ++$i ) {
  print ($color3[$i]."<br />");
}
foreach ($color3 as $key => $value) {
    print ($key . ":" . $value."<br />");
}
?>
</body>
</html>
