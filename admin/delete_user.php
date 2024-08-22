<?php 
ob_start();
include '../database/dbconnect.php';
session_start();


$user_id = $_POST["user_id"];
mysqli_query($conn, "DELETE FROM users WHERE id = '$user_id'");
header("Location: users.php");
exit;
