<?php
ob_start();
include '../database/dbconnect.php';
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>pcs</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div>
      
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

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
                                        <button type="submit" name="register" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-lg gradient-custom-4 text-body"
                                            style="color:white !important ; background-color : #F3525A !important">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                                            href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST["register"])) {

            $email = $_POST["email"];
            $password = $_POST["password"];



            // Hash password 
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);


            // Insert into the users table
            $sql = "INSERT INTO admin (email ,password) VALUES (? , ?)";

            $stmt = $conn->prepare($sql);
            $isadmin = 0;
            $stmt->bind_param("ss",  $email, $hashed_password );

            // Execute the query
            if ($stmt->execute()) {
                //echo "User registered successfully";
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the statement
            $stmt->close();
        }

        // Close the connection
        $conn->close();
        ?>

</body>

</html>

<?php ob_end_flush(); ?>