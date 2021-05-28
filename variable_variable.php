<html>
<head><title>variable_variable.php</title></head>
<body>
<?php
$number=1;
$var_1="one";
$var_2="two";
if($number==1){
    $output="var_1";
}else if($number==2){
    $output="var_2";
}
print $$output;
?>
</body>
</html>
