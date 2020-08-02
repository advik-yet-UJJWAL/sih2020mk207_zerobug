<?php
$schid=$_GET['id'];
if($SchData=mysqli_query( $con, "SELECT * FROM `schemes` WHERE `schemeid`='$schid'"))
  $scname=mysqli_fetch_assoc($SchData);
?>
<h2>Users Regisrered for <?php echo $scname['schemename']; ?></h2>
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
</tr>
<?php
    if($data=mysqli_query( $con, "SELECT * FROM `schemeuser`"));
    while($row = mysqli_fetch_assoc($data)){
      $schemes = json_decode($row['schemes']);

      if($schemes) if (in_array($schid, $schemes)){
        $id=$row['user'];
        if($udata=mysqli_query( $con, "SELECT * FROM `userpersonal_details` WHERE `user_id`='$id'"))
            $rowu = mysqli_fetch_assoc($udata);
        if($udata2=mysqli_query( $con, "SELECT * FROM `user_details` WHERE `id`='$id'"))
            $rowu2 = mysqli_fetch_assoc($udata2);
?>
  <tr>
    <td><?php echo $rowu2['first_name'].$rowu2['last_name']; ?></td>
    <td><?php echo $rowu2['phone']; ?></td>
    <td><?php echo $rowu2['email']; ?></td>
    <td><?php echo $rowu['aadhaar']; ?></td>
  </tr>
<?php 
    }}
?>
</table>