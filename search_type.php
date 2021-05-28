<html>
<head><title>search_type.php</title></head>
<body>
<?php
$var=TRUE;
print (gettype($var)."<br />");
$var=100;
print (gettype($var)."<br />");
$var=100.001;
print (gettype($var)."<br />");
$var="TRUE";
print (gettype($var));
?>
</body>
</html>