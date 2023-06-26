 
<?php
include('../../conn.php');

if (isset($_POST['displaySend'])) {
	?>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql="SELECT * FROM tbl_user WHERE user_level='Employee'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)) {
                
        ?>
            <tr>
                <th scope="row"><?=$row['idnum']?></th>
                <td><?=$row['fullname']?></td>
                <td><button class="btn btn-primary btn-sm" onclick="EditUser(<?=$row['user_id']?>)"><i class="bi-pencil-square"></i> Edit</button></td>
            </tr>
        
	  <?php

            }
		}else{
            ?>
            <tr>
                <th colspan="4" class="text-muted fs-4"><center><i>No Record</i></center></th>
            </tr>
            <?php
            
        }
    }
	?>
    </tbody>

    <?php
    // if(){
        
    // }
    ?>
