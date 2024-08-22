<?php
ob_start();
include '../database/dbconnect.php';
include 'role.php';


if(isset($_SESSION['admin_id'])){
    header("Location: dashboard.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>pcs admin</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
   <div>

        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 mt-5">
                        <div style="background-color : #58168a !important; color: white;" class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center">Create an account</h2>

                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        <input type="email" id="form3Example3cg" name="email"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" id="form3Example4cg" name="password"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="login" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-lg gradient-custom-4 text-body"
                                            style="color:white !important ; background-color : #0dcaf0 !important">Login</button>
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST["login"])) {

                                    $email = $_POST["email"];
                                    $password = $_POST["password"];

                                    $sql = "SELECT id,email, password FROM admin WHERE email = ?";

                                    // Use prepared statement to prevent SQL injection
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("s", $email);

                                    $stmt->execute();

                                    $stmt->bind_result($id, $db_email, $db_password,);

                                    $stmt->fetch();


                                    //verify username and password         
                                    if ($db_email && password_verify($password, $db_password)) {
                                        //session variable (user_id , role)
                                        $_SESSION['admin_id'] = $id;
                                        header("Location: dashboard.php");
                                        

                                    } else {
                                        echo "<p style='color:red ; text-align:center'>اسم المستخدم او كلمة المرور غير صحيحين</p>";
                                    }

                                    $stmt->close();
                                }

                                $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer End -->
</body>

</html>

<?php ob_end_flush(); ?>