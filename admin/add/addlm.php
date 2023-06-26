<?php
include('../../conn.php');
session_start();
extract($_POST);

if (isset($_POST['addLM'])) {


	$sql="INSERT INTO learning_materials (lm_article, lm_description, lm_propnum, lm_aquire, lm_unitm, lm_unitv, lm_q_propertycard, lm_q_physical, lm_so_quantity, lm_so_value, lm_remark, materialtype, grade_lvl) VALUES (
		'$article',
		'$description',
		'$propnum',
		'$d_acquire',
		'$unitmeasure',
		'$unitvalue',
		'$q_propcard',
		'$q_physical',
		'$so_quantity',
		'$so_value',
		'$remark',
		'$material_typ',
		'$gr'
	)";
	
	if(mysqli_query($conn,$sql)){
		$sqlgetid = $conn -> query("SELECT lm_id FROM learning_materials ORDER BY lm_id DESC LIMIT 1");
		$latestid = mysqli_fetch_assoc($sqlgetid);
		$statid = $latestid['lm_id'];
		$userid = $_SESSION['login_user'];
		date_default_timezone_set("Asia/Manila");
		$date_today = date("d/m/Y");

		if($_SESSION['role'] == "Admin"){
			$activity="Added a material (".$material_typ.")";
			if($conn -> query("INSERT INTO tbl_request VALUES ('$statid', '$userid', 'Done', '$date_today')")){
				if($conn->query("INSERT INTO tbl_transaction (activity_person, activity, act_date) VALUES ('$userid','$activity','$date_today')")){
					echo "Success!";
				}
				
			}
		}else{
			$activity="Requested a material (".$material_typ.")";
			if($conn -> query("INSERT INTO tbl_request VALUES ('$statid', '$userid', 'Pending', '$date_today')")){
				if($conn->query("INSERT INTO tbl_transaction (activity_person, activity, act_date) VALUES ('$userid','$activity','$date_today')")){
					echo "Success!";
				}
				
			}
		}
		
    }else{
        echo "Not Saved!";
    }
}

?>