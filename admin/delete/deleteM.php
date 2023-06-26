<?php
    include ("../../conn.php");
    if(isset($_POST['materialID'])){
        $del_id = $_POST['materialID'];
        $sqldel = "DELETE FROM learning_materials AS lm JOIN tbl_request AS req ON lm.lm_id=req.stat_id WHERE lm.lm_id='$del_id'";

        if($conn -> query($sqldel)){
            echo "Success!";
        }else{
            echo "Error!";
        }
    }
?>