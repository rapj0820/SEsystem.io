<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['idnum'])) {

		include ("conn.php");

		// Get user's credentials
        
		$username=$_POST['idnum'];
		$password=$_POST['pass'];
		// query
		$sql = "SELECT * FROM tbl_user WHERE idnum='$username' AND psswrd='$password'";
		$result = mysqli_query($conn,$sql);
		// execute query
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
                $ulvl = $row["user_level"];

				if($ulvl == "Admin"){
					$_SESSION['login_ID'] = $row["user_id"];
					$_SESSION['login_user'] = $row["idnum"];
                    $_SESSION['user_name'] = $row["fullname"];
					$_SESSION['role'] = $ulvl;
					header("location: admin/dashboard.php"); // location
                    
				}else if($ulvl == "Employee") {
					$_SESSION['login_ID'] = $row["user_id"];
                    $_SESSION['login_user'] = $row["idnum"];
                    $_SESSION['user_name'] = $row["fullname"];
					$_SESSION['role'] = $ulvl;
					header("location: employee/dashboard.php"); // location
				
                }else{
					header("location: index.php?error=2");
				}
			}

        }else{
			header("location: index.php?error=1");
				
		}

	}

?>