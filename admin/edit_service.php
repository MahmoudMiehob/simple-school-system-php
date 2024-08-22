<?php
ob_start();
include '../database/dbconnect.php';
session_start();

$service_id = $_POST["editservice_id"];
$name = $_POST["editname"];
$description = $_POST["editdescription"];
$salary = $_POST["editsalary"];

if(file_exists($_FILES['editimage']['tmp_name']) || is_uploaded_file($_FILES['editimage']['tmp_name'])) {
    // Get image data
    $image = $_FILES['editimage'];
    $image_name = $image['name'];
    $image_tmp = $image['tmp_name'];
    $image_size = $image['size'];
    $image_type = $image['type'];

    if ($image_size > 0 && $image_type == 'image/jpeg' || $image_type == 'image/png') {
        // Upload image
        $upload_path = "../img/servieces/" . $image_name;
        if (move_uploaded_file($image_tmp, $upload_path)) {
            // Insert data into database
            $stmt = $conn->prepare("UPDATE services SET name = ?, image = ?, description = ?,salary=? WHERE id = ?");
            $stmt->bind_param("ssssi", $name, $image_name, $description,$salary, $service_id);
            $stmt->execute();

        } else {
            //echo "Error uploading image!";
        }
    } else {
        //echo "Invalid image!";
    }
} else {
    $stmt = $conn->prepare("UPDATE services SET name = ?, description = ?,salary = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $description,$salary , $service_id);
    $stmt->execute();
}

header("Location: servieces.php");

ob_end_flush();