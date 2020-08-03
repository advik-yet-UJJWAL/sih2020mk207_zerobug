<?php
include 'includes/dbconfig.php';
if($data = mysqli_query( $con, "SELECT * FROM `userpersonal_details` WHERE `father_name`='JJ'")){
    $row=mysqli_fetch_assoc($data);
    print_r($row);
}
?>