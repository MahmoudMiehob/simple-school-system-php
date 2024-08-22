

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
                                    <a href="index.php#services-section">الدورات</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php#details" aria-label="Toggle navigation"> التفاصيل</a>
                                </li>
                                <?php if(isset($_SESSION['user_id'])){ ?>
                                <li class="nav-item">
                                    <a href="my_courses.php">دوراتي</a>
                                </li>
                                <?php } ?>
                                <li class="nav-item">
                                    <a href="#footer" aria-label="Toggle navigation"> حولنا</a>
                                </li>
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