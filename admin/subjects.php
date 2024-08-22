<?php
ob_start();
include '../database/dbconnect.php';
include 'role.php';

//check if the user is already login
if (!isset($_SESSION['admin_id']) ) {
  
    header("Location: login.php");
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subject</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/hero/pcs.png" />

</head>

<body>
    <nav class="navbar navbar-light bg-light p-3" style="border-bottom: 2px blue solid;">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                <h2>
                    admin pcs
                </h2>
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    Settings
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="dashboard.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="students.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="ml-2">students</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="teachers.php">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 122.88 94.65">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <title>training</title>
                                    <path class="cls-1"
                                        d="M21.92,0A10.36,10.36,0,1,1,11.57,10.35,10.35,10.35,0,0,1,21.92,0ZM14.61,22.7l3.68,9.65h.39l1.79-6.18-1-1.05c-.72-1.05-.47-2.25.87-2.47a9.91,9.91,0,0,1,1.45,0,8.37,8.37,0,0,1,1.59.06c1.24.28,1.37,1.48.75,2.44l-1,1.05L25,32.35h.38L28.7,22.7a4.52,4.52,0,0,0,.47.37,6.7,6.7,0,0,1,2.71.85,4.73,4.73,0,0,1,3,2l7.9,10.91,5.63,1.08V16.67h-8a1.86,1.86,0,1,1,0-3.72H77.56V7.52a1.87,1.87,0,0,1,3.73,0V13h39.53a1.86,1.86,0,1,1,0,3.72h-7.93V62.73H121a1.86,1.86,0,0,1,0,3.72H81.55V75a2.56,2.56,0,0,0,.26.2l11.62,11a1.85,1.85,0,1,1-2.54,2.68L81.55,80v8a1.87,1.87,0,0,1-3.73,0V79.68l-9.69,9.21a1.84,1.84,0,0,1-2.62-.07,1.82,1.82,0,0,1,.07-2.61l11.62-11h0a1.71,1.71,0,0,1,.62-.39V66.45H40.37a1.86,1.86,0,0,1,0-3.72h8V47.83L39.1,46A4.88,4.88,0,0,1,36,44.1l-3.93-5.45v.14l-.32,15.78,4,25.24,1.51,8.65c.85,5.78-8,9.21-10.19,1.62L21.91,59.66,16.66,90.57c-1,5.59-10.13,5.64-10.19-1.15l5.79-34.65-.44-18.71a7.9,7.9,0,0,0-1.19,2,12.61,12.61,0,0,0-1,4.58L8.83,53.55C8.39,59.25-.1,59.6,0,53.45c.05-2.76.3-5.54.6-8.37.58-5.42.7-8.78,3.79-14.18a18.3,18.3,0,0,1,4.5-5.21,12.14,12.14,0,0,1,4.88-2.32,7.26,7.26,0,0,0,.84-.67ZM52.13,38.26l10.46-11a2.47,2.47,0,1,1,3.58,3.4L56.33,41a4.89,4.89,0,0,1-4.2,7.46V62.73H109.2V16.67H52.13V38.26Z" />
                                </svg>
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="ml-2">Teachers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="subjects.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                                    image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                                    viewBox="0 0 418 512.535">
                                    <path fill-rule="nonzero"
                                        d="M40.896 237.026c.444-78.78.889-144.007 1.336-222.478.018-5.233 3.732-9.586 8.658-10.603l-.004-.015c53.592-11.186 123.886.624 158.684 46.863C246.233 5.818 313.831-4.137 368.173 3.804c5.425.795 9.33 5.457 9.325 10.785.02 0 .011 205.116.011 223.403 0 6.029-4.887 10.916-10.915 10.916-.871 0-1.718-.105-2.527-.294-20.718-3.267-48.53-1.344-70.273 4.484l-.181 20.595c3.1-.091 6.2-.125 9.3-.106 27.864.177 65.683 4.722 93.256 11.83 0-82.659-.011-151.791-.011-234.435h10.927c6.027 0 10.915 4.887 10.915 10.916v237.8c0 6.028-4.888 10.916-10.915 10.916-1.231 0-2.414-.205-3.519-.58-24.055-6.888-54.318-11.953-80.722-13.867 1.621 2.518 2.854 5.38 3.784 8.476h13.992c.563 0 1.111.065 1.636.189 12.586 2.019 18.453 10.811 21.008 22.01a7.141 7.141 0 011.896-.255h9.848c.564 0 1.113.066 1.64.191 27.033 4.324 26.638 39.142 26.379 61.855-.008.761-.017 1.479-.017 5.486l.565 25.171c.016.263.019.529.007.799-1.209 24.503-12.31 43.636-23.751 63.356l-.969 1.692c-5.047 8.826-10.9 15.567-17.568 20.177-6.788 4.692-14.297 7.104-22.538 7.192l-.652.029h-84.431v-.024c-8.493.169-15.088-3.546-19.937-10.816-3.904-5.848-6.499-14.044-7.898-24.372l-53.319-80.679c-3.149-4.217-7.429-10.777-10.64-18.062-2.409-5.466-4.234-11.397-4.616-17.22-.451-6.887.506-12.435 2.468-16.773 2.438-5.386 6.31-8.898 11-10.805 4.375-1.78 9.317-2.044 14.299-1.054 5.972 1.188 12.128 4.212 17.377 8.551 4.393 3.63 11.565 9.52 18.424 15.127l6.061 4.952.284-53.02c-3.991 1.48-7.983 3.1-11.977 4.864a10.936 10.936 0 01-6.199 1.81 10.933 10.933 0 01-6.196-1.81c-29.266-12.933-58.454-18.06-87.631-17.874-29.92.189-70.303 5.989-100.736 14.704-1.105.375-2.288.58-3.522.58C4.888 310.614 0 305.726 0 299.698v-237.8c0-6.029 4.888-10.916 10.915-10.916h10.916v234.435c27.576-7.108 65.392-11.653 93.256-11.83 25.738-.162 51.474 3.419 77.24 12.158-16.027-12.993-33.898-22.509-52.946-28.723-24.01-7.835-60.141-10.438-86.723-8.156-6.005.492-11.273-3.974-11.765-9.979a10.608 10.608 0 01.003-1.861zm324.052 103.841c.295 7.593-.147 15.445-.548 22.562-.239 4.226-.46 8.143-.46 11.734a7.143 7.143 0 01-14.283 0c0-3.396.248-7.781.515-12.516 1-17.705 2.336-41.379-10.03-43.721h-11.158c.556 8.456.053 17.402-.399 25.417-.239 4.225-.46 8.142-.46 11.732a7.143 7.143 0 01-14.284 0c0-3.395.248-7.78.516-12.515.999-17.704 2.335-41.381-10.032-43.723h-9.369a7.195 7.195 0 01-1.57-.175l-.325 36.85a7.115 7.115 0 01-14.227-.111l.754-85.89-.022-.565c0-12.428-5.069-20.264-11.544-23.538-2.377-1.202-4.931-1.808-7.454-1.812a16.324 16.324 0 00-7.414 1.796c-6.412 3.259-11.413 11.127-11.413 23.849h-.027l-.76 142.342a7.115 7.115 0 01-14.228-.056l.07-13.121a7.122 7.122 0 01-1.193-.773 1777.083 1777.083 0 01-13.81-11.178 5011.309 5011.309 0 01-18.481-15.182c-3.448-2.851-7.351-4.809-11.016-5.539-2.356-.468-4.517-.416-6.209.272-1.379.561-2.556 1.675-3.355 3.442-1.043 2.306-1.532 5.593-1.241 10.022.257 3.927 1.625 8.238 3.444 12.366 2.692 6.107 6.344 11.688 9.038 15.293.159.214.305.434.437.659l54.239 82.073a7.084 7.084 0 011.135 3.097c1.085 8.936 2.982 15.62 5.781 19.813 2.03 3.043 4.659 4.593 7.941 4.509l.167-.002v-.026h84.431l.591.025c5.292-.08 10.128-1.649 14.509-4.679 4.843-3.348 9.266-8.543 13.271-15.547l1.027-1.747c10.541-18.17 20.77-35.804 21.844-56.749l-.543-24.29a7.204 7.204 0 01-.077-1.046l.073-5.697c.203-17.772.514-44.991-14.267-47.651h-9.372l-.212-.004zm-74.486-109.385c20.719-5.113 46.06-7.293 65.22-5.771V24.253c-48.14-4.545-107.824 5.005-135.596 49.25v191.441a343.885 343.885 0 017.347-4.774l.053-9.929h-.028c0-18.89 8.423-31.079 19.224-36.571a30.51 30.51 0 0113.886-3.302 30.82 30.82 0 0113.871 3.319c6.73 3.403 12.554 9.359 16.023 17.795zm57.363 183.293a5.833 5.833 0 0111.665 0v26.677a5.833 5.833 0 01-11.665 0v-26.677zm-34.477-11.786a5.833 5.833 0 0111.665 0v38.461a5.834 5.834 0 01-11.665 0v-38.461zM198.259 262.846V73.178C172.635 28.033 111.358 16.964 63.924 23.74l-1.225 202.662c25.265-.9 60.166 2.315 83.419 9.901 18.519 6.04 36.056 14.847 52.141 26.543z" />
                                </svg>
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="ml-2">subjects</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                                    image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                                    viewBox="0 0 512 439.977">
                                    <path
                                        d="M47.969 439.893V245.409c-9.754 3.749-18.876 3.833-26.458 1.244-5.917-1.996-10.914-5.577-14.583-10.206-3.665-4.621-5.997-10.246-6.71-16.456-1.08-9.622 1.793-20.501 10.003-30.707.416-.5.876-1 1.416-1.416L249.366 2.303c3.081-2.833 7.834-3.13 11.247-.456L498.886 187.08c.377.288.713.585 1.04.961 11.043 11.87 13.796 25.037 11.127 36.164a33.734 33.734 0 01-7.582 14.495 32.911 32.911 0 01-13.494 9.126c-8.339 2.996-18.253 2.917-28.295-1.837v193.399l-23.333.005v-203.65c0-4.209-163.441-133.406-181.485-147.445-19.12 14.539-185.566 142.696-185.566 148.109v203.57l-23.329-.084zm213.816-253.8h28.508a2.38 2.38 0 012.368 2.368v24.121a2.388 2.388 0 01-2.368 2.368h-28.508a2.38 2.38 0 01-2.368-2.368v-24.121a2.371 2.371 0 012.368-2.368zm-40.076 0h28.507a2.38 2.38 0 012.368 2.368v24.121a2.388 2.388 0 01-2.368 2.368h-28.507a2.379 2.379 0 01-2.368-2.368v-24.121a2.37 2.37 0 012.368-2.368zm40.076-35.456h28.508a2.38 2.38 0 012.368 2.368v24.121a2.388 2.388 0 01-2.368 2.368h-28.508a2.38 2.38 0 01-2.368-2.368v-24.121a2.371 2.371 0 012.368-2.368zm-40.076 0h28.507a2.385 2.385 0 012.368 2.368v24.121c0 1.284-1.084 2.368-2.368 2.368h-28.507a2.385 2.385 0 01-2.368-2.368v-24.121a2.37 2.37 0 012.368-2.368zM154.147 392.23c.27-47.733.54-87.252.81-134.795a6.586 6.586 0 015.249-6.422l-.004-.009c32.468-6.776 75.059.376 96.14 28.392 22.213-27.25 63.171-33.278 96.095-28.467a6.607 6.607 0 015.648 6.532c.013 0 .008 124.276.008 135.353a6.613 6.613 0 01-8.143 6.436c-14.469-2.28-34.651-.39-48.327 4.496-11.016 3.931-21.838 9.808-32.504 17.018 14.601-4.581 29.189-6.475 43.777-6.382 16.885.106 39.798 2.859 56.501 7.165 0-50.079-.004-91.966-.004-142.036h6.616a6.614 6.614 0 016.617 6.612V430.2a6.614 6.614 0 01-8.745 6.263c-18.443-5.28-42.905-8.794-61.034-8.91-17.677-.11-35.363 2.992-53.093 10.831a6.664 6.664 0 01-3.758 1.097 6.662 6.662 0 01-3.753-1.097c-17.73-7.839-35.416-10.941-53.093-10.831-18.124.116-42.591 3.63-61.033 8.91a6.653 6.653 0 01-2.134.35 6.613 6.613 0 01-6.612-6.613V286.123a6.613 6.613 0 016.612-6.612h6.617v142.036c16.708-4.306 39.616-7.059 56.501-7.165 15.593-.102 31.185 2.071 46.796 7.365-9.711-7.874-20.537-13.637-32.08-17.403-14.543-4.749-36.438-6.325-52.54-4.944a6.608 6.608 0 01-7.13-6.045 6.816 6.816 0 010-1.125zm190.722-128.914c-29.167-2.752-65.327 3.032-82.154 29.84v115.986c11.224-7.493 22.687-13.641 34.464-17.846 13.429-4.793 33.398-7.059 47.69-5.922V263.316zM249.49 407.871V292.957c-15.526-27.352-52.651-34.057-81.388-29.95l-.743 122.784c15.309-.545 36.451 1.403 50.539 6.001 11.224 3.656 21.847 8.994 31.592 16.079zM462.182 21.409v92.931l-71.536-47.206V21.409h71.536z" />
                                </svg>
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="ml-2">courses</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">

                <h1 class="h2">subjects</h1>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add new subjects
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new subjects</h5>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="form-group">
                                        <label for="name">Subject Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary" name="addSubject">Add subject</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>

                                </form>

                                <?php
                                if (isset($_POST['addSubject'])) {
                                    // Get the form data
                                    $name = $_POST["name"];

                                    // Insert the data into the database
                                    $query = "INSERT INTO subjects (name) VALUES ('$name')";
                                    $result = mysqli_query($conn, $query);

                                    // Check if the data was inserted successfully
                                    if ($result) {
                                        //echo "Subject added successfully!";
                                    } else {
                                        //echo "Error adding subject: " . mysqli_error($conn);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $sql = "SELECT * FROM subjects";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) { // check if there are results or not
                    $subjects = $result->fetch_all(MYSQLI_ASSOC);
                    ?>
                    <table class="table table-primary table-striped table-bordered">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // table data
                            if ($subjects != null) {
                                foreach ($subjects as $subject) { ?>
                                    <tr>
                                        <th scope="row"><?= $subject['id'] ?></th>
                                        <td><?= $subject['name'] ?></td>

                                        <td class="text-center">
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editModal<?= $subject['id'] ?>">edit</button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal<?= $subject['id'] ?>">delete</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </main>
            </div>
        </div>


        <!-- edit Modal -->
        <?php foreach ($subjects as $subject) { ?>
            <div class="modal fade" id="editModal<?= $subject['id'] ?>" tabindex="-1" role="dialog"
                aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit subject</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="edit_subject.php" method="post">
                                <input type="hidden" name="editsubject_id" value="<?= $subject['id'] ?>">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="editname" name="editname"
                                        value="<?= $subject['name'] ?>">
                                </div>


                                <button type="submit" name="editsubject_id" value="<?= $subject["id"] ?>"
                                    class="btn btn-primary">Save
                                    changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- delete Modal -->
        <?php
        if ($subjects !== null) {
            foreach ($subjects as $subject) { ?>
                <div class="modal fade" id="deleteModal<?= $subject['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete subject <?= $subject['name'] ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="delete_subject.php" method="post">
                                    <input type="hidden" name="subject_id" value="<?= $subject['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        }
                } ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>