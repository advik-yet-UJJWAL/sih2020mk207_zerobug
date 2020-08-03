<?php include 'includes/dbconfig.php'; ?>
<?php 
session_start();

if(isset($_SESSION["loggedIn"])) {
    if(!empty($_SESSION["loggedInUserId"])) {
        $id = $_SESSION["loggedInUserId"];
        $sql = "SELECT * FROM user_details WHERE id = ".$id;
        if($result = $con->query($sql)){
          $record = $result->fetch_assoc();
          if($record['isUpdated']=='true'){
            //header('Location: profile.php');exit;
          }
        }
    }
    
}
else {
    header("Location:index.php");exit;
}
function aadharValidation($aadharNumber) {
	/*...multiplication table...*/
	$multiplicationTable = [
		[0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
		[1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
		[2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
		[3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
		[4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
		[5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
		[6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
		[7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
		[8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
		[9, 8, 7, 6, 5, 4, 3, 2, 1, 0],
	];
	/*...permutation table...*/
	$permutationTable = [
		[0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
		[1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
		[5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
		[8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
		[9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
		[4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
		[2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
		[7, 0, 4, 6, 9, 1, 3, 2, 5, 8],
	];
	/*...split aadhar number...*/
	$aadharNumberArr = str_split($aadharNumber);
	/*...check length of aadhar number...*/
	if (count($aadharNumberArr) == 12) {
		/*...reverse aadhar number...*/
		$aadharNumberArrRev = array_reverse($aadharNumberArr);
		$tableIndex         = 0;
		/*...validate...*/
		foreach ($aadharNumberArrRev as $aadharNumberArrKey => $aadharNumberDetail) {
			$tableIndex = $multiplicationTable[$tableIndex][$permutationTable[($aadharNumberArrKey % 8)][$aadharNumberDetail]];
		}
		return ($tableIndex === 0);
	}
	return false;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $father_name = mysqli_real_escape_string($con, $_POST['father_name']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $aadhaar = $_POST['aadhaar'];
    echo $aadhaar;
    $isAadhaarValid=aadharValidation($aadhaar);
    if ($isAadhaarValid === true) {
        $aadhaar=mysqli_real_escape_string($con, $aadhaar);
    }
    else {
        header("location:profile.php?error=aadhaar");exit;
    }
    $pan= trim($_POST['pan']);
    if (!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $pan)) {
        header("location:profile.php?error=pan");exit;
    }
    else{
        $pan= mysqli_real_escape_string($con, $_POST['pan']);
    }
    $bank_acc_no= mysqli_real_escape_string($con, $_POST['bank_acc_no']);
    $rashan_card_no= mysqli_real_escape_string($con, $_POST['rashan_card_no']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $pin = $_POST['pin'];
    $pinUrl=file_get_contents("https://api.postalpincode.in/pincode/$pin");
    $pinUrl1=json_decode($pinUrl,true);
    if($pinUrl1[0]['Status']==='Success'){
        $pin=mysqli_real_escape_string($con, $pin);
    }
    else{
        header("location:profile.php?error=pin");exit;
    }
    if($con->connect_error){
        die("Connection Failed:".$con->connect_error);
    }
    $sql="UPDATE `user_details` SET `isUpdated`='true',`father_name`='$father_name',dob='$dob',gender='$gender',aadhaar='$aadhaar',`address`='$address',district='$district',`state`='$state',pin='$pin',`pan`='$pan',`bank_acc_no`='$bank_acc_no',`rashan_card_no`='$rashan_card_no' WHERE `user_details`.`id` = '$id'";
    if($con->query($sql)){
        header("location:myDashboard.php");exit;
    }else{
        echo"Error".$sql."<br>".$con->error;
    }
}
?>