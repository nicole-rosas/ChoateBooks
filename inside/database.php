<?php 
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "login_test";

$connection = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$connection) { #if there is something missing in the variable connection
	die("missing information in connection".mysqli_connect_error());
}
?>