<?php 
ob_start();
include '../database/dbconnect.php';
session_start();



// Get the course ID from the modal
$course_id = $_POST['editcourse_id'];

// Get the updated course data from the form
$name = $_POST['editname'];
$duration = $_POST['duration'];
$duration_time = $_POST['duration_time'];
$cost = $_POST['cost'];
$stage = $_POST['stage'];
$classroom = $_POST['classroom'];

// Update the course data in the database
$query = "UPDATE courses SET 
            name = '$name', 
            duration = '$duration', 
            duration_time = '$duration_time', 
            cost = '$cost', 
            stage = '$stage', 
            classroom = '$classroom' 
          WHERE id = '$course_id'";

if (mysqli_query($conn, $query)) {
  header ('Location: courses.php');
} 

// Close the database connection
mysqli_close($conn);
?>