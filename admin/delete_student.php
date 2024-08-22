<?php 
ob_start();
include '../database/dbconnect.php';
session_start();


$student_id = $_POST["student_id"];

$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("i", $student_id);
$stmt->execute();

header("Location: students.php");
?>
