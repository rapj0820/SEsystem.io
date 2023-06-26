<?php

    include("../../conn.php");
    session_start();
    if(isset($_POST['method'])){
        $id_tobe_use = $_POST['lmid'];
        $method_tobe_use = $_POST['method'];
        
        $queryS = $conn->query("SELECT stat FROM tbl_request WHERE stat_id='$id_tobe_use'");
        $getCurrStat = mysqli_fetch_assoc($queryS);

        date_default_timezone_set("Asia/Manila");
		$date_today = date("d/m/Y");
        $steps = array('Decline','Pending','Approved','Outgoing','Incoming','Arrived','Done');

        if($method_tobe_use == "approve"){

            $CURstatus = array_search($getCurrStat['stat'], $steps);
            $status_become = $steps[$CURstatus+1];
            $sql = $conn -> query("UPDATE tbl_request SET stat='$status_become', stat_date='$date_today' WHERE stat_id = '$id_tobe_use'");
            
            if($sql){

                $userid = $_SESSION['login_user'];
                $activity = "Processed ".$getCurrStat['stat']." material to (".$status_become.")";

                if($conn->query("INSERT INTO tbl_transaction (activity_person, activity, act_date) VALUES ('$userid','$activity','$date_today')")){
                    echo "success";
                }else{
                    echo "error saving transaction!";
                }

            }else{
                echo "Error processing material!";
            }

        }elseif($method_tobe_use == "decline"){
            $CURstatus = array_search($getCurrStat['stat'], $steps);
            $status_become = $steps[$CURstatus-1];
            $sql = $conn -> query("UPDATE tbl_request SET stat='$status_become', stat_date='$date_today' WHERE stat_id = '$id_tobe_use'");
            
            if($sql){
                $userid = $_SESSION['login_user'];
                $activity = "Processed ".$getCurrStat['stat']." material to (".$status_become.")";
                if($conn->query("INSERT INTO tbl_transaction (activity_person, activity, act_date) VALUES ('$userid','$activity','$date_today')")){
                    echo "success";
                }else{
                    echo "error saving transaction!";
                }
            }else{
                echo "Error processing material!";
            }
            
        }
        
        
        // $sql = $conn -> query("UPDATE tbl_request SET stat='$status_become', stat_date='$date_today' WHERE stat_id = '$id_tobe_use'");
        
    }
?>