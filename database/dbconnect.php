<?php
$servername = "localhost";
$username = "root";
$password = "";
$database= 'courses_online';

$conn = mysqli_connect($servername, $username, $password, $database);

if(mysqli_connect_error())
	{
		// error in database connection 
		echo ("Database connection error");
	}
	else 
	{
		$set_char_set_query= 'SET CHARACTER SET utf8'; 
		mysqli_query($conn,$set_char_set_query); 
		//echo "database connection successfully" ;
	}
?>