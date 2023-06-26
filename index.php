<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
  if ($_SESSION['role'] == "Admin")
  {
    header("location: admin/dashboard.php");
  }
  elseif ($_SESSION['role'] == "Employee")
  {
    header("location: employee/dashboard.php");
  }
  else
  {
    header("location: index.php");
  }
}

if(isset($_GET['error'])){
  $error = "Invalid ID Number / Password";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.104.2">
    <title>San Esteban Inventory System</title>

    <link href="bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js" ></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap-icons.css">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="login.php" method="POST">
    <img class="mb-3 rounded-circle" src="images/school_logo.jpeg" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal">Inventory System</h1>
    <h6 class="text-muted"><i>San Esteban National High School</i></h6><br>

    <div class="form-floating">
      <input type="text" class="form-control" name="idnum" id="floatingInput" placeholder="00000000" required  autocomplete="off">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password" required autocomplete="off" >
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" id="checks" value="show"> Show Password
      </label>
    </div>
    <span style="color:red; font-size: 12px;"><i><?php echo $error; ?></i></span><br>
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign in"><br>
    <p class="mt-3 mb-3 text-muted"> <br>&copy; 2022–2023</p>
  </form>
    
</main>


  <!-- scripts -->
  <script src="jquery-3/jq.js" ></script>

  <script>
    $(document).ready(function(){
          
    });

    $('#checks').click(function(){
      $(this).is(':checked') ? $('#floatingPassword').attr('type', 'text') : $('#floatingPassword').attr('type', 'password');
    });

    function onlyNumberKey(evt) {
      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
          return false;
      return true;
    }
  </script>
    
  </body>
</html>
