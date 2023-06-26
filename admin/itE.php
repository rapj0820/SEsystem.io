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
    <title>Inventory System - I.T. Equipments</title>

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
                <a class="nav-link active ms-2" href="itE.php">
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
                <a class="nav-link" href="transaction.php">
                  <i class="bi-receipt"></i>
                   Transaction History
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><i class="bi-motherboard"></i> I.T. Equipments</h1>
            <input type="hidden" class="form-control w-25" id="searchprp" placeholder="Search Property #">
            <input type="hidden" name="" id="invtype" value="IT Equipment">
            <select name="" id="filter_glvl" class="form-select" style="width:150px;" >
              <option value="all" selected>All Records</option>
              <option value="7">Grade 7</option>
              <option value="8">Grade 8</option>
              <option value="9">Grade 9</option>
              <option value="10">Grade 10</option>
              <option value="11">Grade 11</option>
              <option value="12">Grade 12</option>
            </select>
          </div>
            <!-- CONTENT -->

          <button class="btn btn-outline-primary btn-sm mt-2 mb-2 px-3" onclick="btn_add_lm()">Add Instructional Material</button>
          <a href="pdfReport/report.php?lm=IT Equipment" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary"><i class="bi-printer"> Report</i></a>
          <table class="table table-striped table-hover">
            <!-- table content -->
          </table>
        </main>
      </div>
    </div>

    <!-- MODALS -->
    <!-- add list -->
    <div class="modal fade modal-lg" id="add_lm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <form id="lerningM">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">I.T. Equipments</h1>
            <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          
            <div class="mb-3 row">
              <label for="name" class="col-sm-3 col-form-label">Article</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="article" name="article" autocomplete="off" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Description</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="description" style="height: 50px"></textarea>
              </div>
            </div>

           
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Property #</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="propnum" name="propnum" autocomplete="off" required>
              </div>
              <label for="username" class="col-2 col-form-label">Grade</label>
              <div class="col-2">
                <select class="form-select" id="gradelevel" aria-label=".form-select-sm example" required="required">
                  <option selected value="" disabled></option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Date Acquire</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="d_acquire" name="d_acquire" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>
            <hr>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Unit Measure</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="unitmeasure" name="password">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Unit Value</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="unitvalue" name="unitvalue" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>
            <hr>
            <div class="mb-3 row">
              <label for="username" class="col-sm-6 col-form-label">Quantity per Property Card</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="q_propcard" name="q_propcard" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="username" class="col-sm-6 col-form-label">Quantity per Physical</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="q_physical" name="q_physical" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>
            <hr>
             <b>Storage/Overtage</b>
            <div class="mb-3 row">
              <label for="username" class="col-sm-6 col-form-label">Quantity</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="so_quantity" name="so_quantity" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="username" class="col-sm-6 col-form-label">Value</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-plaintext" id="so_value" name="so_value" autocomplete="off" readonly value="0" required>
              </div>
            </div>
            <hr>
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Remark</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="remark" style="height: 50px" required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" id="add_close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" value="Save" class="btn btn-primary">
            <!-- <button type="submit" class="btn btn-primary" id="add_new_user">Save</button> -->
          </div>
          </form>
        </div>
      </div>
    </div>



<!-- update Material -->
<div class="modal fade modal-lg" id="update_lm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <form id="update_lerningM">
          <input type="hidden" name="" id="update_number" value="">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">I.T. Equipments</h1>
            <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          
            <div class="mb-3 row">
              <label for="name" class="col-sm-3 col-form-label">Article</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="update_article" name="article" autocomplete="off" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Description</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="update_description" style="height: 50px"></textarea>
              </div>
            </div>

           
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Property #</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" disabled id="update_propnum" name="propnum" autocomplete="off" required>
              </div>
              <label for="username" class="col-2 col-form-label">Grade</label>
              <div class="col-2">
                <select class="form-select" id="update_gradelevel" aria-label=".form-select-sm example" required="required">
                  <option selected value="" disabled></option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Date Acquire</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="update_d_acquire" name="d_acquire" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>
            <hr>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Unit Measure</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="update_unitmeasure" name="password">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Unit Value</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="update_unitvalue" name="unitvalue" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>
            <hr>
            <div class="mb-3 row">
              <label for="username" class="col-sm-6 col-form-label">Quantity per Property Card</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="update_q_propcard" name="q_propcard" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="username" class="col-sm-6 col-form-label">Quantity per Physical</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="update_q_physical" name="q_physical" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>
            <hr>
             <b>Storage/Overtage</b>
            <div class="mb-3 row">
              <label for="username" class="col-sm-6 col-form-label">Quantity</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="update_so_quantity" name="so_quantity" autocomplete="off" onkeypress="return onlyNumberKey(event)" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="username" class="col-sm-6 col-form-label">Value</label>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-plaintext" id="update_so_value" name="so_value" autocomplete="off" readonly value="0" required>
              </div>
            </div>
            <hr>
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Remark</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="update_remark" style="height: 50px" required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" id="update_close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" value="Update" class="btn btn-primary">
            <!-- <button type="submit" class="btn btn-primary" id="add_new_user">Save</button> -->
          </div>
          </form>
        </div>
      </div>
    </div>


    <?php
      include("../alertModals.php");
    ?>


    <!-- scripts -->
    <script src="../jquery-3/jq.js" ></script>
    <script src="../js/system.js" ></script>
    <script>
      
    </script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->
  </body>
</html>
