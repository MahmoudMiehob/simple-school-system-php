<?php
ob_start();
include '../database/dbconnect.php';
session_start();

//check if the user is already login
if (!isset($_SESSION['teacher_id'])) {
  header("Location: login.php");
  exit();
}else{
  $teacher_id = $_SESSION['teacher_id'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>students</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/hero/pcs.png" />

    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body>
  <nav class="navbar navbar-light bg-light p-3" style="border-bottom: 2px blue solid;">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
      <a class="navbar-brand" href="#">
        <h2>
        teacher pcs
        </h2>
      </a>
      <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
        data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">

      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
          aria-expanded="false">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="ml-2">Dashboard</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" href="students.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span class="ml-2">students</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="courses.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 439.977"><path d="M47.969 439.893V245.409c-9.754 3.749-18.876 3.833-26.458 1.244-5.917-1.996-10.914-5.577-14.583-10.206-3.665-4.621-5.997-10.246-6.71-16.456-1.08-9.622 1.793-20.501 10.003-30.707.416-.5.876-1 1.416-1.416L249.366 2.303c3.081-2.833 7.834-3.13 11.247-.456L498.886 187.08c.377.288.713.585 1.04.961 11.043 11.87 13.796 25.037 11.127 36.164a33.734 33.734 0 01-7.582 14.495 32.911 32.911 0 01-13.494 9.126c-8.339 2.996-18.253 2.917-28.295-1.837v193.399l-23.333.005v-203.65c0-4.209-163.441-133.406-181.485-147.445-19.12 14.539-185.566 142.696-185.566 148.109v203.57l-23.329-.084zm213.816-253.8h28.508a2.38 2.38 0 012.368 2.368v24.121a2.388 2.388 0 01-2.368 2.368h-28.508a2.38 2.38 0 01-2.368-2.368v-24.121a2.371 2.371 0 012.368-2.368zm-40.076 0h28.507a2.38 2.38 0 012.368 2.368v24.121a2.388 2.388 0 01-2.368 2.368h-28.507a2.379 2.379 0 01-2.368-2.368v-24.121a2.37 2.37 0 012.368-2.368zm40.076-35.456h28.508a2.38 2.38 0 012.368 2.368v24.121a2.388 2.388 0 01-2.368 2.368h-28.508a2.38 2.38 0 01-2.368-2.368v-24.121a2.371 2.371 0 012.368-2.368zm-40.076 0h28.507a2.385 2.385 0 012.368 2.368v24.121c0 1.284-1.084 2.368-2.368 2.368h-28.507a2.385 2.385 0 01-2.368-2.368v-24.121a2.37 2.37 0 012.368-2.368zM154.147 392.23c.27-47.733.54-87.252.81-134.795a6.586 6.586 0 015.249-6.422l-.004-.009c32.468-6.776 75.059.376 96.14 28.392 22.213-27.25 63.171-33.278 96.095-28.467a6.607 6.607 0 015.648 6.532c.013 0 .008 124.276.008 135.353a6.613 6.613 0 01-8.143 6.436c-14.469-2.28-34.651-.39-48.327 4.496-11.016 3.931-21.838 9.808-32.504 17.018 14.601-4.581 29.189-6.475 43.777-6.382 16.885.106 39.798 2.859 56.501 7.165 0-50.079-.004-91.966-.004-142.036h6.616a6.614 6.614 0 016.617 6.612V430.2a6.614 6.614 0 01-8.745 6.263c-18.443-5.28-42.905-8.794-61.034-8.91-17.677-.11-35.363 2.992-53.093 10.831a6.664 6.664 0 01-3.758 1.097 6.662 6.662 0 01-3.753-1.097c-17.73-7.839-35.416-10.941-53.093-10.831-18.124.116-42.591 3.63-61.033 8.91a6.653 6.653 0 01-2.134.35 6.613 6.613 0 01-6.612-6.613V286.123a6.613 6.613 0 016.612-6.612h6.617v142.036c16.708-4.306 39.616-7.059 56.501-7.165 15.593-.102 31.185 2.071 46.796 7.365-9.711-7.874-20.537-13.637-32.08-17.403-14.543-4.749-36.438-6.325-52.54-4.944a6.608 6.608 0 01-7.13-6.045 6.816 6.816 0 010-1.125zm190.722-128.914c-29.167-2.752-65.327 3.032-82.154 29.84v115.986c11.224-7.493 22.687-13.641 34.464-17.846 13.429-4.793 33.398-7.059 47.69-5.922V263.316zM249.49 407.871V292.957c-15.526-27.352-52.651-34.057-81.388-29.95l-.743 122.784c15.309-.545 36.451 1.403 50.539 6.001 11.224 3.656 21.847 8.994 31.592 16.079zM462.182 21.409v92.931l-71.536-47.206V21.409h71.536z"/></svg>
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

        <h1 class="h2">student</h1>

        <?php
      $sql = "SELECT s.* 
      FROM students s 
      JOIN students_courses sc ON s.id = sc.student_id 
      WHERE sc.teacher_id = $teacher_id";

      $result = $conn->query($sql);

        if ($result->num_rows > 0) { // check if there are results or not
          $students = $result->fetch_all(MYSQLI_ASSOC);
          ?>
          <table class="table table-primary table-striped table-bordered">
            <thead class="table-dark">
              <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">age</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // table data
              if ($students != null) {
                $serial = 1;

                foreach ($students as $student) { ?>
                  <tr>
                    <th scope="row"><?= $serial ?></th>
                    <td><?= $student['name'] ?></td>
                    </td>
                    
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['age'] ?></td>
                  </tr>
                <?php $serial++ ; } ?>
              </tbody>
            </table>
          <?php } }?>
        </main>
      </div>
    </div>


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