<?php
  session_start();

  include("../conn.php");
  if(!isset($_SESSION['login_user']) || $_SESSION['role'] != "Admin" ){
      header("location: ../index.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Inventory System - Transaction History</title>

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
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6">Welcome <b><i><?= explode(' ', trim($_SESSION['user_name']))[0];?></b></i></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <img src="../images/school_logo.jpeg" width="40" height="40" class="ms-2 rounded-circle">
      <h5 class="w-100 text-light ms-3">San Esteban National High School Inventory System</h5>
      <div class="navbar-nav">
        
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3 text-dark" id="signout" href="#"><i class="bi-box-arrow-right"></i> Sign Out</a>
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
                <a class="nav-link" aria-current="page" href="dashboard.php">
                  <i class="bi-house-door"></i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="users.php">
                  <i class="bi-people"></i>
                  Users
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
              <h6 class="sidebar-heading d-flex align-items-center px-3 mb-2 mt-4 text-muted text-uppercase">
                <i class="bi-three-dots-vertical"></i><span>Transaction</span>
              </h6>
              <li class="nav-item">
                <a class="nav-link" href="request.php">
                  <i class="bi-card-list"></i>
                   Requests
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active ms-2" href="transaction.php">
                  <i class="bi-receipt"></i>
                   Transaction History
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><i class="bi-receipt"></i> Transaction History</h1>
            
          </div>
            <!-- CONTENT -->

            <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Request</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php 
                  $queryhistory = $conn -> query("SELECT * FROM tbl_transaction AS trans INNER JOIN tbl_user AS user ON trans.activity_person=user.idnum ORDER BY history_id DESC");
                  if(mysqli_num_rows($queryhistory)>0){
                    $no=0;
                    while($historyRow = mysqli_fetch_assoc($queryhistory)){
                      $no++;
                  ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=$historyRow['fullname']?></td>
                      <td><?=$historyRow['activity']?></td>
                      <td><?=$historyRow['act_date']?></td>
                    </tr>
                  <?php
                    }
                  }
                  ?>
                  
                </tbody>
              </table>
        </main>
      </div>
    </div>


    <?php
      include("../alertModals.php");
    ?>

    <!-- scripts -->
    <script src="../jquery-3/jq.js" ></script>
    <script>
      $("#signout").click(function (){
        $('#ConfirmLogout').modal('toggle');
        $('#logout_yes').click(function(){
          window.location.href = "../logout.php";
        });
      });
    </script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->
  </body>
</html>
