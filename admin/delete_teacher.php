<?php 
ob_start();
include '../database/dbconnect.php';
session_start();


$teacher_id = $_POST["teacher_id"];
mysqli_query($conn, "DELETE FROM teachers WHERE id = '$teacher_id'");
header("Location: teachers.php");
exit;
