<?php 
include '../database/dbconnect.php';

    session_start();
    if(isset($_SESSION['admin_id'])){
        $admin_id = $_SESSION['admin_id'];

        $sql = "SELECT * FROM admin WHERE id = $admin_id ";
        $result = $conn->query($sql);
    
        if ($result) {
            $admin_data = $result->fetch_assoc();
            $role = $admin_data['role'];
        }
    }

 ?>