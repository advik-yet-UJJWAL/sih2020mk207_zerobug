<?php include 'includes/dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZeroBugPas | Dashboard</title>
    
    <link rel="stylesheet" href="css/dashboard.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Secular+One" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
   
    <?php
                    session_start(); 
                    if(isset($_SESSION["loggedIn"])) {
                        if(!empty($_SESSION["loggedInUserId"])) {
                            $id = $_SESSION["loggedInUserId"];
                            
                            
                            
                            $sql = "SELECT * FROM user_details WHERE id = ".$id;
                            $result = $con->query($sql);
                            $record = $result->fetch_assoc(); 
                            
//                            $sql_img = "SELECT Image FROM user WHERE Id = ".$id;
//                            $result_img = $conn->query($sql);
//                            $record_img = $result->fetch_assoc();   
                        }
                       
                    }else {
                        header("Location:index.php");
                      }
           ?>
   
<nav class="navbar navbar-expand-lg" style="background-color: #192a56;">
  <a class="navbar-brand" style="color: white; text-decoration: none;" href="">ZeroBugPas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" style="color: white; text-decoration: none;" href="">Welcome,&nbsp;<?php echo $record["first_name"]; ?></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="color: white; text-decoration: none; margin-left: 1600%;" href="logout_config.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
   
   
    <header>
        <div id="head">
            <h2>Dashboard</h2>
        </div>
    </header>
    
<!--This part of code is for profile picture and name & mail-id-->
  
 
<!--This part of code is for card menu-->
<main class="main">
   <div class="container">
    <div class="card card--split-1">
    <div class="card__pic">
     <span class="card__placeholder">
    <img src="images/profile.png" alt="">
   </span>
    </div>
        <h2 class="card__headline card__headline--centered"><a href="profile.php" style="color: white; text-decoration: none;">Profile</a></h2>
   </div>

    <div class="card card--split-2">
    <div class="card__pic">
     <span class="card__placeholder">
    <img src="images/service.png" alt="">
   </span>
    </div>
        <h2 class="card__headline card__headline--centered" ><a href="Apply_Services.php" style="color: white; text-decoration: none;" data-toggle="modal" data-target="#categoryModal">New Services</a></h2>
   </div>
   
   <div class="card card--split-3">
    <div class="card__pic">
     <span class="card__placeholder">
    <img src="images/payment.png" alt="">
   </span>
    </div>
    <h2 class="card__headline card__headline--centered"><a href="schemes\index.html" style="color: white; text-decoration: none;"> Get Scheme Details</h2></a>
   </div>
   
   <div class="card card--split-4">
    <div class="card__pic">
     <span class="card__placeholder">
    <img src="images/chat.png" alt="">
   </span>
    </div>
    <h2 class="card__headline card__headline--centered"><a href="schemes\forum.php" style="color: white; text-decoration: none;">Customer Queries</h2></a>
   </div>
   
  
</main>
 <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select State and Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="test.php" method="post">
      <div class="modal-body">
         
        <div class="input-group mb-3">

          <select class="custom-select" id="inputGroupSelect01" name="state">
            <option selected value="0">SELECT STATE</option>
            <?php
              $sql = "SELECT * FROM states WHERE status = 1";
              $result = $con->query($sql);
              while($arr = $result->fetch_assoc()) {
              ?>
            <option value="<?php echo $arr["stateid"]; ?>"><?php echo $arr["statename"]; ?></option>
            <?php } ?>
          </select>
                  </div>
                <div class="input-group mb-3">

          <select class="custom-select" id="inputGroupSelect02" name="category">
           <option selected value="0">SELECT CATEGORY</option>
            <?php
              $sql = "SELECT * FROM categories WHERE status = 1";
              $result = $con->query($sql);
              while($arr = $result->fetch_assoc()) {
              ?>
            <option value="<?php echo $arr["categoryid"]; ?>"><?php echo $arr["categoryname"]; ?></option>
            <?php } ?>
          </select>
             
         
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">View</button>
      </div>
    </div>
        </form>
  </div>
</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  
</body>




</html>