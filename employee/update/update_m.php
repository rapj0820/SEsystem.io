<?php 
include('../../conn.php');
//display record
session_start();
if(isset($_POST['m_id'])){
	$M_mainID=$_POST['m_id'];

	$sql="SELECT * FROM learning_materials WHERE lm_id = '$M_mainID'";
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



if(isset($_POST['updateM'])){

    $updateID = $_POST['updateM'];
    $article = $_POST['article'];
    $description = $_POST['description'];
    $propnum = $_POST['propnum'];
    $d_acquire = $_POST['d_acquire'];
    $unitmeasure = $_POST['unitmeasure'];
    $unitvalue = $_POST['unitvalue'];
    $q_propcard = $_POST['q_propcard'];
    $q_physical = $_POST['q_physical'];
    $so_quantity = $_POST['so_quantity'];
    $so_value = $_POST['so_value'];
    $remark = $_POST['remark'];
    $gr = $_POST['gr'];
    $material_type = $_POST['material_type'];
    
    $U_query = "UPDATE learning_materials SET lm_article='$article', lm_description='$description', lm_propnum='$propnum', lm_aquire='$d_acquire', lm_unitm='$unitmeasure', lm_unitv='$unitvalue', lm_q_propertycard='$q_propcard', lm_q_physical='$q_physical', lm_so_quantity='$so_quantity', lm_so_value='$so_value', lm_remark='$remark', materialtype='$material_type', grade_lvl='$gr' WHERE lm_id='$updateID'";
    if(mysqli_query($conn, $U_query)){
        $activity="Update material material detail (Propperty #: ".$propnum.")";
        $userid = $_SESSION['login_user'];
        if($conn->query("INSERT INTO tbl_transaction (activity_person, activity, act_date) VALUES ('$userid','$activity','$date_today')")){
			echo "Success!";
		}
    }else{
        echo "Error!";
    }
}

?>