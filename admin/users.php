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
    <title>Inventory System - Manage User</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/"> -->

    <link href="../bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="../bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js" ></script>

   
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    
    <link href="../assets/bootstrap-icons.css" rel="stylesheet">
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
                <a class="nav-link active ms-2" aria-current="page" href="users.php">
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
            <h1 class="h2"><i class="bi-people"></i> User Management</h1>
          </div>
            <!-- CONTENT -->

          <button class="btn btn-outline-primary btn-sm mt-2 mb-2 px-4" onclick="btn_add_user()">Add User</button>
          <table class="table table-striped">
            <!-- table content -->
          </table>
        </main>
      </div>
    </div>



    <!-- MODALS -->
    <!-- add user -->
    <div class="modal fade" id="add_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add User</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3 row">
              <label for="name" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Fullname</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
              </div>
            </div>
                    <!-- uname -->
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="idnum" name="idnum" autocomplete="off" onkeypress="return noSpace(event)" required>
              </div>
            </div>
                    <!-- pass -->
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="inputPassword" name="password">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-3 col-form-label">User Level</label>
                <div class="col-sm-9">
                  <input type="text" readonly class="form-control-plaintext" name="ulvl" id="staticEmail" value="Employee">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="add_new_user">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- edit user -->
    <div class="modal fade" id="edit_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3 row">
              <input type="hidden" name="" id="hidddenID">
              <label for="name" class="col-sm-3 col-form-label">Fullname</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="u_name" name="name" autocomplete="off" required>
              </div>
            </div>
                    <!-- uname -->
            <div class="mb-3 row">
              <label for="username" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="u_idnum" name="idnum" autocomplete="off" onkeypress="return noSpace(event)" required>
              </div>
            </div>
                    <!-- pass -->
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="u_inputPassword" name="password">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-3 col-form-label">User Level</label>
                <div class="col-sm-9">
                  <input type="text" readonly class="form-control-plaintext" name="ulvl" id="u_staticEmail" >
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update_user">Edit</button>
          </div>
        </div>
      </div>
    </div>
<?php
      include("../alertModals.php");
    ?>

    <!-- scripts -->
    <script src="../jquery-3/jq.js" ></script>
    <script>
      $(document).ready(function(){
        displayData();
      });

      //open add modal
      function btn_add_user(){
        $("#add_user").modal('show');
        $('#idnum').removeClass("is-invalid");
        $('#name').val('');
        $('#idnum').val('');
        $('#inputPassword').val('');
      }

      
      //add user
      $("#add_new_user").click(function(){
        var name=$('#name').val();
        var password=$('#inputPassword').val();
        var uname=$('#idnum').val();
        var ulvl=$('#staticEmail').val();
        if (name !='' && uname !='' && password !='' && ulvl !='')
        {       
            $.ajax({
                url:"add/adduser.php",
                type:'post',
                data:{
                  name:name,
                  uname:uname,
                  password:password,
                  ulvl:ulvl
                },
                success:function(data,status){
                  // alert(fname+password+uname+stat+ ulvl)
                  
                  if(data == 'Success!'){
                    $('#name').val('');
                    $('#idnum').val('');
                    $('#inputPassword').val('');
                    $('#add_user').modal('hide');
                    $("#alertSuccess").modal('toggle');
                  }else if(data == 'User Exist'){
                    $("#alertExist").modal('toggle');
                    $('#idnum').addClass("is-invalid");
                  }
                  displayData();
                }
            }); 
        }else{
          $("#alertincEntry").modal('toggle');
        } 
      });

      function EditUser(userID){
        $.post("update/update_user.php",{userid:userID},function(data,status){
          var tbl_user = JSON.parse(data);
          $('#hidddenID').val(userID);
          $('#u_name').val(tbl_user.fullname);
          $('#u_idnum').val(tbl_user.idnum);
          $('#u_inputPassword').val(tbl_user.psswrd);
          $('#u_staticEmail').val(tbl_user.user_level);
          $("#edit_user").modal('toggle');
        });
      }

      //update user
      $("#update_user").click(function(){
        var up_id = $('#hidddenID').val();
        var up_name = $('#u_name').val();
        var up_uname = $('#u_idnum').val();
        var up_pass = $('#u_inputPassword').val();
        if (up_id != '' && up_name !='' && up_uname !='' && up_pass !='')
        {
          $.ajax({
            url:"update/update_user.php",
            type:'post',
            data:{
              up_id:up_id,
              up_name:up_name,
              up_uname:up_uname,
              up_pass:up_pass
            },
            success:function(data,status){
              
              if(data == 'Success!'){
                $("#alertSuccess").modal('toggle');
              }else{
                $("#alertNotSave").modal('toggle');
              }
              displayData();
            }
          }); 
        }
        else
        {
          $("#alertincEntry").modal('toggle');
        } 
        
      });

      //display table
      function displayData(){
          var displayData="true";
          $.ajax({
              url:"display/display_user.php",
              type:'post',
              data:{
              displaySend:displayData
              },
              success:function(data,status){
              $('.table').html(data);
              }
          });
        }
      //accept only nunmber and validate
      function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
      }
      // no spaces
      function noSpace(ev) {
        // Only ASCII character in that range allowed
        var ASCIICode = (ev.which) ? ev.which : ev.keyCode
        if (ASCIICode == 32)
            return false;
        return true;
      }
      //log out
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
