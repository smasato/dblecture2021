<html>
<head><title>array.php</title></head>
<body>
<?php
$color1[0]="red";
$color1[1]="green";
$color1[2]="blue";
$color1[3]="yellow";
print_r($color1);
print("<br />");

$color2[]="red";
$color2[]="green";
$color2[]="blue";
$color2[]="yellow";
print_r($color2);
print("<br />");

$color3=array(0=>'red', 1=>'green', 2=>'blue', 3=>'yellow');
print_r($color3);
?>
</body>
</html>
