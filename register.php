<?php 
ob_start();
include 'database/dbconnect.php';


?>
<!DOCTYPE html>
<html dir="ltr" class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>register - PCS</title>
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
                <label for="name" class="form-label">الاسم</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">العمر</label>
                <input type="number"  name="age"  class="form-control" id="age" placeholder="Enter your age">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">رقم الهاتف </label>
                <input type="text"  name="number"  class="form-control" id="number" placeholder="Enter your phone number">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">الايميل</label>
                <input type="email"  name="email"  class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة السر</label>
                <input type="password"  name="password"  class="form-control" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <p class="text-center mt-2"><a href="login.php" style="color:white ; text-decoration: underline;">تسجيل دخول </a> لدي حساب مسبقا  </p>

        </form>
        <?php 

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $name = $_POST["name"];
             $age = $_POST["age"];
             $number = $_POST["number"];
             $email = $_POST["email"];
             $password = $_POST["password"];


             $hashed_password = password_hash($password, PASSWORD_DEFAULT);

         
             // Validate input data
             if (empty($name) || empty($age) || empty($number) || empty($email) || empty($password)) {
                 echo "Please fill in all fields.";
             } else {
                 // Insert data into database
                 $sql = "INSERT INTO students (name, age, phone_number, email, password) VALUES (?, ?, ?, ?, ?)";
                 $stmt = $conn->prepare($sql);
                 $stmt->bind_param("sisss", $name, $age, $number, $email, $hashed_password);
                
                 if( $stmt->execute()){
                    header ('Location: login.php');
                 }

                }
         }
         
         // Close connection
         $conn->close();
         ?>
        
    </div>
</body>

</html>