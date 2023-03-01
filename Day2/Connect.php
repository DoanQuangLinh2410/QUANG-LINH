<?php
	$hostname='localhost';
	$user='root';
	$pass='';
	$database='LTMT4';
	
	$conn=mysqli_connect($hostname,$user,$pass,$database);	
	mysqli_query($conn,'set names"utf8"');
?>

