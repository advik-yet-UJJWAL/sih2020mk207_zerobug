<?php
    if(isset($_POST['schUpd'])){
        if(!empty($_POST['userId']))
            $usrId=$_POST['userId'];
        if(!empty($_POST['schId']))
            $schId=array();
            array_push($schId,$_POST['schId']);
            $schId=json_encode ($schId);
            //print_r($schId);
        if($con->query("UPDATE `schemeuser` SET `schemes`='$schId'WHERE `schemeuser`.`user` = ".$usrId));
        else echo 'Please Try Again';
    }
?>
<h2>Redundant Users</h2>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
<table style="width:100%">
<tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Aadhar</th>
    <th>Schemes Registered</th>
</tr>
<?php
    if($data=mysqli_query( $con, "SELECT * FROM `schemeuser`"));
    while($row = mysqli_fetch_assoc($data)){
        $schemes = json_decode($row['schemes']);
        if($schemes)if(sizeof($schemes)>1){
            $id=$row['user'];
            if($udata=mysqli_query( $con, "SELECT * FROM `userpersonal_details` WHERE `user_id`='$id'"))
                $rowu = mysqli_fetch_assoc($udata);
            if($udata2=mysqli_query( $con, "SELECT * FROM `user_details` WHERE `id`='$id'"))
                $rowu2 = mysqli_fetch_assoc($udata2);
?>
  <tr>
    <td><?php echo $rowu2['first_name'].' '.$rowu2['last_name']; ?></td>
    <td><?php echo $rowu2['phone']; ?></td>
    <td><?php echo $rowu2['email']; ?></td>
    <td><?php echo $rowu['aadhaar']; ?></td>
    <td>
        <?php
            foreach ($schemes as $key=>$value) {
                if($udata3=mysqli_query( $con, "SELECT * FROM `schemes` WHERE `schemeid`='$value'"))
                    $rowu3=mysqli_fetch_assoc($udata3);
                    echo $rowu3['schemename'].' | ';
            }
        ?>
        <form action="" method="post" style='margin:auto;'>
            <select name='schId'>
            <?php foreach ($schemes as $key=>$value) {
                if($udata3=mysqli_query( $con, "SELECT * FROM `schemes` WHERE `schemeid`='$value'"))
                    $rowu3=mysqli_fetch_assoc($udata3);
                    ?>
                    <option value="<?php echo $rowu3['schemeid']; ?>"><?php echo $rowu3['schemename']; ?></option>
            <?php }
            ?>
            </select>
            <input type="hidden" name="userId" value='<?php echo $id; ?>'>
            <input type="submit" name='schUpd' value="Update" style='border-radius:10px;'>
        </form>
    </td>
  </tr>
<?php 
        }
    }
?>
</table>