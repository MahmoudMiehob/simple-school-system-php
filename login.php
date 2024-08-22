<?php
ob_start();
include 'database/dbconnect.php';
session_start();


if(isset($_SESSION['user_id'])){
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html dir="ltr" class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>login - PCS</title>
    <meta name="description" content="width= device-width,initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/hero/pcs.png" />


    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body id="bart">

    <div class="warpper">
        <form <?php echo htmlentities($_SERVER['PHP_SELF']); ?> method="POST">

            <div class="mb-3">
                <label for="email" class="form-label">الايميل</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة السر</label>
                <input type="password" name="password" class="form-control" id="password"
                    placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <p class="text-center mt-2" ><a href="register.php"  style="color:white ;text-decoration: underline;">  انشاء حساب  </a></p>
        </form>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT id,email, password FROM students WHERE email = ?";

            // Use prepared statement to prevent SQL injection
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);

            $stmt->execute();

            $stmt->bind_result($id, $db_email, $db_password, );

            $stmt->fetch();

            //verify username and password         
            if ($db_email && password_verify($password, $db_password)) {
                //session variable (user_id , role)
                $_SESSION['user_id'] = $id;
                header("Location: index.php");

            } else {
                echo "<p style='color:red ; text-align:center'>اسم المستخدم او كلمة المرور غير صحيحين</p>";
            }

            $stmt->close();
        }
        ?>

    </div>
</body>
</html>