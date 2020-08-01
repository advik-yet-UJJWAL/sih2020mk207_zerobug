<?php include 'includes/dbconfig.php'; ?>
<!DOCTYPE html> 
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
                            
                            
                            
                          //  $sql_img = "SELECT Image FROM user WHERE Id = ".$id;
                          //  $result_img = $con->query($sql);
                          //  $record_img = $result->fetch_assoc();   
                        }
                       
                    }else {
                        header("Location:index.php");
                      }
           ?>
  



   <div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>

          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" method="post">
         
          <div class="form-group">
            <label class="col-lg-3 control-label">Father's Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" disabled>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label">DOB:</label>
            <div class="col-lg-8">
              <input class="form-control" type="date" value="" disabled>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Contact No:</label>
            <div class="col-lg-8">
              <input class="form-control" type="tel" value="<?php echo $record["phone"]; ?>" disabled>
            </div>
          </div>
          
            <div class="form-group">
            <label class="col-lg-3 control-label">Gender:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control" disabled>
                <option value=""></option>
                  
                </select>
              </div>
          </div>
          
          <h3>Identity</h3>
          
           <div class="form-group">
            <label class="col-lg-3 control-label">Adhaar No:</label>
            <div class="col-lg-8">
              <input class="form-control" type="Number" value="" disabled>
            </div>
          </div>
          
          
       <h3>Address</h3>


            <div class="form-group">
              <label class="col-lg-3 control-label">Address:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">District:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="" disabled>
              </div>
            </div>

            <div class="form-group">
            <label class="col-lg-3 control-label">State:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" disabled>
            </div>
          </div>
          
           
          
           <div class="form-group">
            <label class="col-lg-3 control-label">Pin Code:</label>
            <div class="col-lg-8">
              <input class="form-control" type="number" value="" disabled>
            </div>
          </div>
        
             
        
             <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <a href="profile.php"><input type="button" class="btn btn-primary" value="Edit" ></a>
              <span></span>
            </div>
          </div>
            </div>
        </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>