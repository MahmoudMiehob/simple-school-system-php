<?php 
ob_start();
include '../database/dbconnect.php';
session_start();


$subject_id = $_POST["subject_id"];
mysqli_query($conn, "DELETE FROM subjects WHERE id = '$subject_id'");
header("Location: subjects.php");
exit;
