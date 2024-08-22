<?php
ob_start();
include 'database/dbconnect.php';
session_start();


if(isset($_SESSION['user_id'])){
    $student_id = $_SESSION['user_id'];
    }
?>
<!DOCTYPE html>
<html dir="rtl" class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SIA - PCS Startup Landing Page Template.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/hero/pcs.png" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

</head>

<body>
    <?php include 'navbar.php'; ?>


    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">

    </div>
    <!-- End Breadcrumbs -->



    <!-- Start Services Area -->
    <div class="services section">
        <div class="container">
            <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    $sql = "SELECT c.* ,
                    t.name AS teacher_name,
                    s.name AS subject_name
                        FROM courses c 
                        JOIN students_courses sc ON c.id = sc.course_id 
                        INNER JOIN 
                    teachers t ON c.teacher_id = t.id
                INNER JOIN 
                    subjects s ON c.subject_id = s.id
                        WHERE sc.student_id = $student_id";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { // check if there are results or not
                        $courses = $result->fetch_all(MYSQLI_ASSOC);
                        if ($courses != null) {
                            foreach ($courses as $course) {
                                
                                ?>
                                <div class="col">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $course['name'] ?></h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">المدة : <?= $course['duration'] ?></li>
                                            <li class="list-group-item">الوقت : <?= $course['duration_time'] ?></li>
                                            <li class="list-group-item">الكلفة : <?= $course['cost'] ?></li>
                                            <li class="list-group-item">المرحلة : <?= $course['stage'] ?></li>
                                            <li class="list-group-item">الصف : <?= $course['classroom'] ?></li>
                                            <li class="list-group-item">المدرس : <?= $course['teacher_name'] ?></li>
                                            <li class="list-group-item">المادة : <?= $course['subject_name'] ?></li>
                                        </ul>
                                        
                                    
                                    </div>
                                </div>
                            <?php }
                        }
                    } ?>
                </div>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $course_id = $_POST['course_id'];
                        $teacher_id = $_POST['teacher_id'];
                    
                        $sql = "INSERT INTO students_courses (student_id, course_id, teacher_id) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("iii", $student_id, $course_id, $teacher_id);
                        $stmt->execute();
                    
                    }
                ?>
            </div>
        </div>

    </div>
    <!-- End Services Area -->

    <?php
    if (!isset($_SESSION['user_id'])) {
        include 'login_section.php';
    }
    ?>


    <!-- Start Footer Area -->
    <footer class="footer section">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-about">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="assets/images/hero/pcs.png" alt="#">
                                    </a>
                                </div>
                                <p>Making the world a better place through constructing elegant hierarchies.</p>
                                <h4 class="social-title">Follow Us On:</h4>
                                <ul class="social">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-pinterest"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Solutions</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Marketing</a></li>
                                    <li><a href="javascript:void(0)">Analytics</a></li>
                                    <li><a href="javascript:void(0)">Commerce</a></li>
                                    <li><a href="javascript:void(0)">Insights</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Support</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Pricing</a></li>
                                    <li><a href="javascript:void(0)">Documentation</a></li>
                                    <li><a href="javascript:void(0)">Guides</a></li>
                                    <li><a href="javascript:void(0)">API Status</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer newsletter">
                                <h3>Subscribe</h3>
                                <p>Subscribe to our newsletter for the latest updates</p>
                                <form action="#" method="get" target="_blank" class="newsletter-form">
                                    <input name="EMAIL" placeholder="Email address" required="required" type="email">
                                    <div class="button">
                                        <button class="sub-btn"><i class="lni lni-envelope"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
        <!-- Start Copyright Area -->
        <div class="copyright-area">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <p class="copyright-text">© 2024 CryptoLand - All Rights Reserved</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <p class="copyright-owner">Designed and Developed by <a href="https://graygrids.com/"
                                    rel="nofollow" target="_blank">GrayGrids</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        //========= testimonial 
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 3,
                }
            }
        });

        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();
    </script>
</body>

</html>