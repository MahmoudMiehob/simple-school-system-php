<?php 
ob_start();
include '../database/dbconnect.php';
session_start();


$course_id = $_POST["course_id"];

$stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
$stmt->bind_param("i", $course_id);
$stmt->execute();

header("Location: courses.php");
?>
