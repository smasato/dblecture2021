<html>
<head><title>bit.php</title></head>
<body>
<?php
$a=5; /* 0101 */
$b=9; /* 1001 */
$c=1; /* 0001 */
print (($a & $b)."<br />"); /* 0001 */
print (($a | $b)."<br />"); /* 1101 */
print (($a ^ $b)."<br />"); /* 1100 */
print ((~$a)."<br />"); /* 1010 */
print (($a << $c)."<br />"); /* 1010 */
print (($a >> $c)); /* 0010 */
?>
</body>
</html>
