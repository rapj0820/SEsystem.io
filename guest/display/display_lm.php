 
<?php
include('../../conn.php');

if (isset($_POST['inv_type'])) {
	?>
        <thead>
            <tr>
                <th scope="col" colspan="4"></th>
                <th scope="col" colspan="2" class="table-active"><center>Unit</center></th>
                <th scope="col" colspan="2" class="bg-light"><center>Quantity per</center></th>
                <th scope="col" colspan="2" class="table-active"><center>Shortage/Overtage</center></th>
                <th scope="col"></th>
            </tr>
            <tr style = "text-align:center;">
                <th scope="col">Article</th>
                <th scope="col">Description</th>
                <th scope="col">Property #</th>
                <th scope="col">Date Acquire</th>
                <th scope="col" class="table-active">Measure</th>
                <th scope="col" class="table-active">Value</th>
                <th scope="col" class="bg-light">Property Card</th>
                <th scope="col" class="bg-light">Physical</th>
                <th scope="col" class="table-active">Quantity</th>
                <th scope="col" class="table-active">Value</th>
                <th scope="col">Remark</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $type = $_POST['inv_type'];
        $gr = $_POST['grade_lvl'];
        if($gr != "all"){
            $sql="SELECT * FROM learning_materials WHERE materialtype='$type' AND grade_lvl = '$gr'";
        }else{
            $sql="SELECT * FROM learning_materials WHERE materialtype='$type'";
        }
        //$sql="SELECT * FROM learning_materials WHERE materialtype='$type' AND grade_lvl = '$gr'";

        
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)) {
                
        ?>
            <tr>
                <td><?=$row['lm_article']?></td>
                <td><?=$row['lm_description']?></td>
                <td><?=$row['lm_propnum']?></td>
                <td><?=$row['lm_aquire']?></td>
                <td><?=$row['lm_unitm']?></td>
                <td style = "text-align:center;"><?="&#8369 ".$row['lm_unitv']?></td>
                <td style = "text-align:center;"><?=$row['lm_q_propertycard']?></td>
                <td style = "text-align:center;"><?=$row['lm_q_physical']?></td>
                <td style = "text-align:center;"><?=$row['lm_so_quantity']?></td>
                <td style = "text-align:center;"><?="&#8369 ".(double)$row['lm_unitv']*$row['lm_so_quantity']?></td>
                <td><?=$row['lm_remark']?></td>
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

