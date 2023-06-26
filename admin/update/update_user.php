<?php 
include('../../conn.php');
//display record
session_start();
if(isset($_POST['userid'])){
	$U_mainID=$_POST['userid'];

	$sql="SELECT * FROM tbl_user WHERE user_id = '$U_mainID'";
	$result=mysqli_query($conn,$sql);
	$response=array();
	while ($row=mysqli_fetch_assoc($result)) {
		$response=$row;
	}
	echo json_encode($response);
}else{
	$response['status']=200; //200 means ok
	$response['message']="Invalid or data not found";
}


if(isset($_POST['up_id'])){

    $up_id = $_POST['up_id'];
    $up_name = $_POST['up_name'];
    $up_uname = $_POST['up_uname'];
    $up_pass = $_POST['up_pass'];
    date_default_timezone_set("Asia/Manila");
	$date_today = date("d/m/Y");
    $U_query = "UPDATE tbl_user SET idnum='$up_uname', fullname='$up_name', psswrd='$up_pass' WHERE user_id='$up_id'";
    if(mysqli_query($conn, $U_query)){
        $activity="Update user information ( ".$up_name." )";
        $userid = $_SESSION['login_user'];
        if($conn->query("INSERT INTO tbl_transaction (activity_person, activity, act_date) VALUES ('$userid','$activity','$date_today')")){
			echo "Success!";
		}
    }else{
        echo "Error!";
    }
}
?>