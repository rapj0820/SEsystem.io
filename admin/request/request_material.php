 
<?php
include('../../conn.php');

if (isset($_POST['r'])) {

    
	?>
    
        <thead>
            <tr>
                <th scope="col" colspan="6"><i class="text-warning bi-square-fill"> Pending</i> <i class="bi-arrow-right"></i> <i class="text-success bi-square-fill"> Approved</i> <i class="bi-arrow-right"></i> <i class="text-secondary bi-square-fill"> Outgoing</i> <i class="bi-arrow-right"></i> <i class="text-primary bi-square-fill"> Incomming</i>   <i class="bi-arrow-right"></i> <i class="text-dark bi-square-fill"> Arrived</i> <i class="bi-arrow-right"> Distributed</i>  </th>
                <th scope="col" colspan="2" class="table-active"><center>Unit</center></th>
                <th scope="col" colspan="2" class="bg-light"><center>Quantity per</center></th>
                <th scope="col" colspan="2" class="table-active"><center>Shortage/Overtage</center></th>
            </tr>
            <tr style = "text-align:center;">
                <th scope="col" style="text-align: center; width:80px;" class="bg-dark"><i class="bi-gear-fill text-light"></i></th>
                <th scope="col">Requested By</th>
                <th scope="col">Article</th>
                <th scope="col">Description</th>
                <th scope="col">Property #</th>
                <th scope="col">Date</th>
                <th scope="col" class="table-active">Measure</th>
                <th scope="col" class="table-active">Value</th>
                <th scope="col" class="bg-light">Property Card</th>
                <th scope="col" class="bg-light">Physical</th>
                <th scope="col" class="table-active">Quantity</th>
                <th scope="col" class="table-active">Value</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $gr = $_POST['r'];
        if($gr != "all"){
            // $sql="SELECT * FROM learning_materials WHERE materialtype='$type' AND grade_lvl = '$gr'";
            $sql="SELECT * FROM learning_materials As lm INNER JOIN tbl_request AS tr ON lm.lm_id=tr.stat_id INNER JOIN tbl_user AS user ON tr.user_request=user.idnum WHERE tr.stat != 'Done' AND tr.stat = '$gr'";
        }else{
            $sql="SELECT * FROM learning_materials As lm INNER JOIN tbl_request AS tr ON lm.lm_id=tr.stat_id INNER JOIN tbl_user AS user ON tr.user_request=user.idnum WHERE tr.stat != 'Done'";
        }

        // $sql="SELECT * FROM learning_materials As lm INNER JOIN tbl_request AS tr ON lm.lm_id=tr.stat_id INNER JOIN tbl_user AS user ON tr.user_request=user.idnum WHERE tr.stat != 'Done'";
        //$sql="SELECT * FROM learning_materials WHERE materialtype='$type' AND grade_lvl = '$gr'";

        
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)) {
                
        ?>
            <tr>
                <?php 
                    if($row['stat']=='Pending'){
                        echo "<td class='table-warning' style='text-align: center;'>";
                        echo "<i class='bi-check-lg text-success' style='cursor: pointer;' onclick='approve(".$row['lm_id'].")'></i>";
                        echo "<i class='bi-x-lg text-danger ms-3' style='cursor: pointer;' onclick='decline(".$row['lm_id'].",".$row['stat'].")'></i>";
                    } elseif($row['stat']=='Approved') {
                        echo "<td class='table-success' style='text-align: center;'>";
                        echo "<i class='bi-check-lg text-success' style='cursor: pointer;' onclick='approve(".$row['lm_id'].")'></i>";
                        echo "<i class='bi-x-lg text-danger ms-3' style='cursor: pointer;' onclick='decline(".$row['lm_id'].")'></i>";
                    }elseif($row['stat']=='Outgoing') {
                        echo "<td class='table-secondary' style='text-align: center;'>";
                        echo "<i class='bi-check-lg text-success' style='cursor: pointer;' onclick='approve(".$row['lm_id'].")'></i>";
                        echo "<i class='bi-x-lg text-danger ms-3' style='cursor: pointer;' onclick='decline(".$row['lm_id'].")'></i>";
                    }elseif($row['stat']=='Incoming') {
                        echo "<td class='table-primary' style='text-align: center;'>";
                        echo "<i class='bi-check-lg text-success' style='cursor: pointer;' onclick='approve(".$row['lm_id'].")'></i>";
                        echo "<i class='bi-x-lg text-danger ms-3' style='cursor: pointer;' onclick='decline(".$row['lm_id'].")'></i>";
                    }elseif($row['stat']=='Declined'){
                        echo "<td class='table-danger' style='text-align: center;'>";
                        echo "<i class='bi-check-lg text-success' style='cursor: pointer;' onclick='approve(".$row['lm_id'].")'></i>";
                        echo "<i class='bi-x-lg text-danger ms-3' style='cursor: pointer;' onclick='decline(".$row['lm_id'].")'></i>";
                    }elseif($row['stat']=='Arrived'){
                        echo "<td class='table-light' style='text-align: center;'>";
                        echo "<i class='bi-check-lg text-success' style='cursor: pointer;' onclick='approve(".$row['lm_id'].")'></i>";
                        echo "<i class='bi-x-lg text-danger ms-3' style='cursor: pointer;' onclick='decline(".$row['lm_id'].")'></i>";
                    }
                
                ?>
                
                    <!-- <i class="bi-check-lg text-success" style="cursor: pointer;" onclick="editM(<?=$row['lm_id']?>)"></i>
                    <i class="bi-x-lg text-danger ms-3" style="cursor: pointer;" onclick="deleteM(<?=$row['lm_id']?>)"></i> -->
                </td>
                <td style = "text-align:center;"><?=$row['fullname']?></td>
                <td style = "text-align:center;"><?=$row['lm_article']?></td>
                <td style = "text-align:center;"><?=$row['lm_description']?></td>
                <td style = "text-align:center;"><?=$row['lm_propnum']?></td>
                <td style = "text-align:center;"><?=$row['lm_aquire']?></td>
                <td style = "text-align:center;"><?=$row['lm_unitm']?></td>
                <td style = "text-align:center;"><?="&#8369 ".$row['lm_unitv']?></td>
                <td style = "text-align:center;"><?=$row['lm_q_propertycard']?></td>
                <td style = "text-align:center;"><?=$row['lm_q_physical']?></td>
                <td style = "text-align:center;"><?=$row['lm_so_quantity']?></td>
                <td style = "text-align:center;"><?="&#8369 ".(double)$row['lm_unitv']*$row['lm_so_quantity']?></td>
            </tr>
        
	  <?php

            }
		}else{
            ?>
            <tr>
                <th colspan="14" class="text-muted fs-4"><center><i>No Record</i></center></th>
            </tr>
            <?php
            
        }
    }

	?>
    </tbody>

