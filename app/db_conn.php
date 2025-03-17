<?php  
$sname = "localhost";
$uname = "u627331213_victor";
$password = "076victorL%";

$db_name = "u627331213_ridewithme";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}