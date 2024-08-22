<?php
ob_start();
include 'database/dbconnect.php';
session_start();

?>

<!DOCTYPE html>
<html dir="rtl" class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>pcs start</title>
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




<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /End Preloader -->

<!-- Start Header Area -->
<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/images/hero/pcs.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="index.php" class="active" aria-label="Toggle navigation">الرئيسية</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#services-section">الدورات</a>
                                </li>
                              
                                <li class="nav-item">
                                    <a href="#details">التفاصيل</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#footer">حولنا</a>
                                </li>
                                <?php if(isset($_SESSION['user_id'])){ ?>
                                <li class="nav-item">
                                    <a href="my_courses.php">دوراتي</a>
                                </li>
                                <?php } ?>
                               
                            </ul>
                        </div> <!-- navbar collapse -->
                        <?php
                        if (isset($_SESSION['user_id'])) { ?>
                            <div>
                                <a href="logout.php">
                                    <button class="btn btn-secondary" type="button" aria-expanded="false">
                                        تسجيل خروج </button></a>
                            </div>
                        <?php } else {
                            ?>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-expanded="false">
                                    سجل الان
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li class="text-center"><a class="dropdown-item" href="admin/login.php">مدير</a>
                                    </li>
                                    <li class="text-center"><a class="dropdown-item" href="teacher/login.php">استاذ</a></li>
                                    <li class="text-center"><a class="dropdown-item" href="register.php">طالب</a></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
<!-- End Header Area -->


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
    <!-- Github buttons -->
    <script defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="hero-content">
                        <h4 class="wow fadeInUp" data-wow-delay=".4s"></h4>أهلا وسهلا بكم في مركزنا </h4>
                        <h1 class="wow fadeInUp" data-wow-delay=".5s"> سلسلة المراكز الاحترافية pcs</h1>


                        <!--         
                        <div class="button wow fadeInUp" data-wow-delay=".10s">
                            <a href="about-us.html" class="btn ">المزيد</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="hero-image">
                        <img class="main-image" src="assets/images/hero/pcs.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Services Area -->
    <div class="services section" id="services-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3 class="wow zoomIn" data-wow-delay=".2s">ما هي دوراتنا </h3>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">لديكم الأقسام </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"> أكبر مجموعة تعليمية وتدريبية في المنطقة الوسطى حيث
                            تضم أربع مراكز تدريبية مختلفة الاختصاصات (pcs) </p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                    <a href="course.php?stage=7">
                        <div class="single-service">
                            <div class="main-icon">
                                <i class="lni lni-grid-alt"></i>
                            </div>
                            <h4 class="text-title" background-img="C:\Users\user\Desktop\4_5978861876400886024.jpg"> دورات سياحية </h4>
                            <p>
                    دوراتنا تقودها خبراء السفر ذوو الخبرة الذين سيشاركونك معرفتهم وأفكارهم لمساعدتك على استغلال رحلتك إلى أقصى حد. ستتعلم عن الثقافة المحلية والتاريخ والعادات، بالإضافة إلى النصائح العملية حول كيفية التنقل في الأماكن غير المألوفة.
                    </p>
                        </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".4s">
                <a href="course.php?stage=8">
                    <div class="single-service">
                        <div class="main-icon">

                            <i class="lni lni-keyword-research"></i>
                        </div>
                        <h4 class="text-title"> دورات تدريبية </h4>
                    <p>
                    دوراتنا التدريبية تقودها خبراء ذوو خبرة في مجالاتهم، الذين سيشاركونك معرفتهم وأفكارهم لتحسين أدائك. ستتعلم من خلال دروس عملية وتمارين تطبيقية، مما سيساعدك على تطبيق المهارات الجديدة في عملك.
                    </p>      
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".6s">
            <a href="course.php?stage=9">
                <div class="single-service">
                    <div class="main-icon">
                        <i class="lni lni-vector"></i>
                    </div>
                    <h4 class="text-title"> دورات تعليمية </h4>
                   <p>
                   هل أنت تبحث عن طريقة لتحسين معرفتك وتعزيز مهاراتك في مجال معين؟ دوراتنا التعليمية هي الحل الأمثل لك. نحن نقدم دورات تعليمية مخصصة في مختلف المجالات، من العلوم والهندسة إلى الإنسانيات والعلوم الاجتماعية، وغيرها.
                   </p>
                </a>
        </div>
    </div>



    </div>
    </div>
    <!-- End Services Area -->

    <!-- Start About Area -->
    <div id="details" class="about section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="image wow fadeInLeft" data-wow-delay=".2s">
                        <img src="assets/images/about/‏‏PCS-LOGO 2023-1 - نسخة (2).png" alt="#">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="content wow fadeInRight" data-wow-delay=".4s">
                        <h4 style="font-size: 30px;"> أتساءل &#10069;</h4>
                        <h2 style="font-size: 20px;">من نشاطات المركز </h2>
                        <p> يوجد لدى المركز نشاطات عدة منها </p>
                        <div class="list">
                            <div class="single-list">
                                <div class="list-icon">
                                    <i class="lni lni-checkmark"></i>
                                </div>
                                <h4> درب المركز العديد من الأفراد والمؤسسات العامة والخاصة والشركات الربحية والتطوعية
                                    بمجالات عديدة منها </h4>
                                <p>إدارة الموارد البشرية وعمليات الإدارة والقيادة وإدراة العلاقات العامة</p>
                            </div>
                            <div class="single-list">
                                <div class="list-icon">
                                    <i class="lni lni-checkmark"></i>
                                </div>
                                <h4> من الشركات الربحية والتطوعية والشركات العامة والخاصة التي قام المركز بتدريبه</h4>
                                <p>الأمانة العامة لمحافظة حمص _جامعة البعث_مديرية الزراعة_مديرية الصحة </p>
                            </div>
                            <div class="single-list">
                                <div class="list-icon">
                                    <i class="lni lni-checkmark"></i>
                                </div>
                                <h4>حصل المركز على اتفاقيات تعاونية عديدة لتطوير العملية التعليمية كان منها :</h4>
                                <p>عضوية في الأكاديميةالعربية العالمية للتدريب _عضوية في أكاديمية نابو للبحث العلمي </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

    <?php
    if(!isset($_SESSION['user_id'])){
    include 'login_section.php' ;
    }
     ?>

    <!-- Start Footer Area -->
    <footer id="footer" class="footer section">
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
                            <p class="copyright-text">© 2024 PCS - All Rights Reserved</p>
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
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
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

        //========= glightbox
        GLightbox({
            'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoplayVideos': true,
        });

        //============== isotope masonry js with imagesloaded
        imagesLoaded('#container', function () {
            var elem = document.querySelector('.grid');
            var iso = new Isotope(elem, {
                // options
                itemSelector: '.grid-item',
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.grid-item'
                }
            });

            let filterButtons = document.querySelectorAll('.portfolio-btn-wrapper button');
            filterButtons.forEach(e =>
                e.addEventListener('click', () => {

                    let filterValue = event.target.getAttribute('data-filter');
                    iso.arrange({
                        filter: filterValue
                    });
                })
            );
        });

    </script>

</body>

</html>