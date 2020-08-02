<h2>All Users</h2>
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
    if($data=mysqli_query( $con, "SELECT * FROM `user_details`"));
    while($row = mysqli_fetch_assoc($data)){
        $id=$row['id'];
        if($udata=mysqli_query( $con, "SELECT * FROM `userpersonal_details` WHERE `user_id`='$id'"))
            $rowu = mysqli_fetch_assoc($udata);
        if($udata2=mysqli_query( $con, "SELECT * FROM `schemeuser` WHERE `user`='$id'"))
            $rowu2 = mysqli_fetch_assoc($udata2);
?>
  <tr>
    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $rowu['aadhaar']; ?></td>
    <td>
        <?php 
            $schemes=json_decode($rowu2['schemes']);
            if($schemes)
            foreach ($schemes as $key=>$value) {
                if($udata3=mysqli_query( $con, "SELECT * FROM `schemes` WHERE `schemeid`='$value'"))
                    $rowu3=mysqli_fetch_assoc($udata3);
                    echo $rowu3['schemename'].' | ';
            }
            $schemes=null;
        ?>
    </td>
  </tr>
<?php 
    }
?>
</table>