<?php
  session_start();

  include("../conn.php");
  if(isset($_SESSION['login_user']) || isset($_SESSION['role'])){
      header("location: ../index.php");
  }

  $query1 = "SELECT * FROM learning_materials WHERE materialtype ='Learning Material'";
  $query2 = "SELECT * FROM learning_materials WHERE materialtype ='Textbook'";
  $query3 = "SELECT * FROM learning_materials WHERE materialtype ='Teaching Material'";
  $query4 = "SELECT * FROM learning_materials WHERE materialtype ='Instructional Material'";
  $query5 = "SELECT * FROM learning_materials WHERE materialtype ='IT Equipment'";
  $query6 = "SELECT * FROM learning_materials WHERE materialtype ='Office Equipment'";
  $query7 = "SELECT * FROM learning_materials WHERE materialtype ='Science Laboratory'";
  $query8 = "SELECT * FROM learning_materials WHERE materialtype ='Other Property'";

  $sql_q1 = $conn -> query($query1);
  $sql_q2 = $conn -> query($query2);
  $sql_q3 = $conn -> query($query3);
  $sql_q4 = $conn -> query($query4);
  $sql_q5 = $conn -> query($query5);
  $sql_q6 = $conn -> query($query6);
  $sql_q7 = $conn -> query($query7);
  $sql_q8 = $conn -> query($query8);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Inventory System - Dashboard</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/"> -->

    <link href="../bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="../bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js" ></script>

   
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons.css" rel="stylesheet">
    <!-- <link href="css/modals.css" rel="stylesheet"> -->
  </head>
  <body>
    
  <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6">Welcome <b><i>Guest</b></i></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <img src="../images/school_logo.jpeg" width="40" height="40" class="ms-2 rounded-circle">
      <h5 class="w-100 text-light ms-3">San Esteban National High School Inventory System</h5>
      <div class="navbar-nav">
        
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3 text-dark" id="signout" href="../"><i class="bi-box-arrow-right"></i> Login</a>
        </div>
      </div>
    </header>

    <!-- SIDEBAR -->
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

          <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active ms-2" aria-current="page" href="dashboard.php">
                  <i class="bi-house-door"></i>
                  Dashboard
                </a>
              </li>
              <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-2 text-muted text-uppercase">
                <i class="bi-three-dots-vertical"></i>
                <span>Materials</span>
              </h6>
              <li class="nav-item">
                <a class="nav-link" href="learningM.php">
                  <i class="bi-lightbulb"></i>
                  Learning Materials
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="textbooks.php">
                  <i class="bi-book"></i>
                  Text Books
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="teachingM.php">
                  <i class="bi-pen"></i>
                  Teaching Materials
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="instructionalM.php">
                  <i class="bi-bookmark"></i>
                  Instructional Materials
                </a>
              </li>
              <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-2 text-muted text-uppercase">
                <i class="bi-three-dots-vertical"></i>
                <span>Equipments</span>
              </h6>
              <li class="nav-item">
                <a class="nav-link" href="itE.php">
                  <i class="bi-motherboard"></i>
                  I.T. Equipments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="officeE.php">
                <i class="bi-lamp"></i>
                  Office Equipments
                </a>
              </li>
              <h6 class="sidebar-heading d-flex align-items-center px-3 mb-2 mt-4 text-muted text-uppercase">
                <i class="bi-three-dots-vertical"></i><span>Other</span>
              </h6>
              <li class="nav-item">
                <a class="nav-link" href="scilab.php">
                  <i class="bi-lightning"></i>
                  Science & Laboratories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="othersP.php">
                  <i class="bi-building"></i>
                  Other Properties
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><i class="bi-house-door"></i> Dashboard</h1>
          </div>
            <!-- CONTENT -->
          
          <div class="row row-cols-1 row-cols-md-4 g-4 mt-2">

            <div class="col">
              <div class="card text-bg-light">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-around">
                    <div>
                      <h3 class="fw-light">Learning<br>Materials</h3>
                      <a href="learningM.php" class="btn btn-primary btn-sm mt-4 px-4">More Info <i class="bi-arrow-right ms-2"></i></a>
                    </div>
                    <div>
                      
                      <h1 class="bg-light text-secondary p-3 rounded shadow"><?= mysqli_num_rows($sql_q1) ?></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card text-bg-light shadow-sm">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-around">
                    <div>
                      <h3 class="fw-light">Text<br>Books</h3>
                      <a href="textbooks.php" class="btn btn-primary btn-sm mt-4 px-4">More Info <i class="bi-arrow-right ms-2"></i></a>
                    </div>
                    <div><h1 class="bg-light text-secondary p-3 rounded shadow"><?= mysqli_num_rows($sql_q2) ?></h1></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card text-bg-light">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-around">
                    <div>
                      <h3 class="fw-light">Teaching<br>Materials</h3>
                      <a href="teachingM.php" class="btn btn-primary btn-sm mt-4 px-4">More Info <i class="bi-arrow-right ms-2"></i></a>
                    </div>
                    <div><h1 class="bg-light text-secondary p-3 rounded shadow"><?= mysqli_num_rows($sql_q3) ?></h1></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card text-bg-light">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-around">
                    <div>
                      <h3 class="fw-light">Instructional<br>Materials</h3>
                      <a href="instructionalM.php" class="btn btn-primary btn-sm mt-4 px-4">More Info <i class="bi-arrow-right ms-2"></i></a>
                    </div>
                    <div><h1 class="bg-light text-secondary p-3 rounded shadow"><?= mysqli_num_rows($sql_q4) ?></h1></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card text-bg-light">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-around">
                    <div>
                      <h3 class="fw-light">I.T.<br>Equipments</h3>
                      <a href="itE.php" class="btn btn-primary btn-sm mt-4 px-4">More Info <i class="bi-arrow-right ms-2"></i></a>
                    </div>
                    <div><h1 class="bg-light text-secondary p-3 rounded shadow"><?= mysqli_num_rows($sql_q5) ?></h1></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card text-bg-light">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-around">
                    <div>
                      <h3 class="fw-light">Office<br>Equipments</h3>
                      <a href="officeE.php" class="btn btn-primary btn-sm mt-4 px-4">More Info <i class="bi-arrow-right ms-2"></i></a>
                    </div>
                    <div><h1 class="bg-light text-secondary p-3 rounded shadow"><?= mysqli_num_rows($sql_q6) ?></h1></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card text-bg-light">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-around">
                    <div>
                      <h3 class="fw-light">Science and<br>Laboratories</h3>
                      <a href="scilab.php" class="btn btn-primary btn-sm mt-4 px-4">More Info <i class="bi-arrow-right ms-2"></i></a>
                    </div>
                    <div><h1 class="bg-light text-secondary p-3 rounded shadow"><?= mysqli_num_rows($sql_q7) ?></h1></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card text-bg-light">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-around">
                    <div>
                      <h3 class="fw-light">Other<br>Properties</h3>
                      <a href="othersP.php" class="btn btn-primary btn-sm mt-4 px-4">More Info <i class="bi-arrow-right ms-2"></i></a>
                    </div>
                    <div><h1 class="bg-light text-secondary p-3 rounded shadow"><?= mysqli_num_rows($sql_q8) ?></h1></div>
                  </div>
                </div>
              </div>
            </div>

        </main>
      </div>
    </div>

    <?php
      include("../alertModals.php");
    ?>



    <script src="../jquery-3/jq.js" ></script>
    <script>
      $("#signout").click(function (){
          window.location.href = "../logout.php";
      });
    </script>
  </body>
</html>
