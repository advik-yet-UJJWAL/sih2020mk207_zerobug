<?php include 'includes/dbconfig.php'; ?>
<?php
    $p='allu';
    if(isset($_GET['p']))
        $p=$_GET['p'];
?>

<?php 
session_start();
if(isset($_POST['login'])){
    if(!empty($_POST['id'])) $aid=$_POST['id'];
    else echo 'Please Enter Id';
    if(!empty($_POST['password'])) $pass=$_POST['password'];
    else echo 'Please Enter Password';
    if($admin = mysqli_query( $con, "SELECT * FROM `admin` WHERE auser='$aid' ")){
        $arow=mysqli_fetch_assoc($admin);
        if($pass==$arow['apass']){
            $_SESSION['auser']=$aid;
            header("Location: ?success");exit;
        }
        else echo 'Wrong Password!!!';
    }
    else echo 'Wrong Id! Please Reenter';
}
if($p=='logout') {
	session_destroy();
	header("Location: ?");exit;
}
if(isset($_SESSION['auser']))
{
	$aid=$_SESSION['auser'];
?>
<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Admin Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="schemes/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="schemes/assets/css/noscript.css" /></noscript>
		<meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
                            <li><a href="?p=allu">Show All User</a></li>
                            <?php
                                if($schemeD=mysqli_query( $con, "SELECT * FROM `schemes`")){
                                    while($row = mysqli_fetch_assoc($schemeD)){
                            ?>
							    <li><a href="?p=sc&id=<?php echo $row['schemeid']; ?>"><?php echo $row['schemename']; ?> <b>Users</b></a></li>
                            <?php
                            }}
                            ?>
                            <li><a href="?p=redu">Redundant Users</a></li>
                            <li><a href="?p=logout">LogOut</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
                            <h1>Admin Dashboard</h1>
                            <?php
                                if($p=='allu'){
                                    include('adminc/allu.php');
                                }
                                else if($p=='sc'){
                                    include('adminc/schemes.php');
                                }
                                else if($p=='redu'){
                                    include('adminc/redu.php');
                                }
                            ?>
                        </div>
					</div>
        <script src="schemes/assets/js/jquery.min.js"></script>
        <script src="schemes/assets/js/browser.min.js"></script>
        <script src="schemes/assets/js/breakpoints.min.js"></script>
        <script src="schemes/assets/js/util.js"></script>
        <script src="schemes/assets/js/main.js"></script>
	</body>
</html>
<?php } 
else include('adminc/adminLogin.php');
?>