<?php

$con=mysqli_connect("localhost","root","","library");

mysqli_query($con, 'SET NAMES "utf8" COLLATE "utf8_general_ci"' );//For Arabic language
if (mysqli_connect_errno()) { 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
}
?>