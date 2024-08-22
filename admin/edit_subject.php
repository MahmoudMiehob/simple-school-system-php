<?php
ob_start();
include '../database/dbconnect.php';
session_start();

$subject_id = $_POST["editsubject_id"];
$name = $_POST["editname"];



    $stmt = $conn->prepare("UPDATE subjects SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $name , $subject_id);
    $stmt->execute();

header("Location: subjects.php");

ob_end_flush();