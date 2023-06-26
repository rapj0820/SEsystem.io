<?php
include('../../conn.php');
extract($_POST);

if (isset($_POST['uname'])) {

	$findsql = "SELECT * FROM tbl_user WHERE idnum='$uname'";
	$resultfind = mysqli_query($conn, $findsql);
	if(mysqli_num_rows($resultfind)<1){ //validation

		$sql="INSERT INTO tbl_user (idnum, fullname, psswrd, user_level) VALUES ('$uname','$name','$password','$ulvl')";
	    if(mysqli_query($conn,$sql)){
            echo "Success!";
        }else{
            echo "Not Saved!";
        }

	}else{
		echo "User Exist";
	}
	

}
else{
	echo "No ID Number";
}
?>