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
                          //  $result_img = $conn->query($sql);
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
        
        <form class="form-horizontal" role="form" method="post" action="profileSubmit.php" name="myform" onsubmit="return validateForm()">
         
          <div class="form-group">
            <label class="col-lg-3 control-label">Father's Name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="father_name" type="text" placeholder="Father's Name">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label">DOB:</label>
            <div class="col-lg-8">
              <input class="form-control" name="dob" type="date">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Contact No:</label>
            <div class="col-lg-8">
              <input class="form-control" name="phone" type="tel" value="<?php echo $record["phone"]; ?>" disabled>
            </div>
          </div>
          
            <div class="form-group">
            <label class="col-lg-3 control-label">Gender:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control" name="gender">
                <option value="Male">Choose</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
          </div>
          
          <h3>Identity</h3>
          
           <div class="form-group">
            <label class="col-lg-3 control-label">Adhaar No:</label>
            <div class="col-lg-8">
              <input class="form-control" name="aadhaar" type="Number" placeholder="e.g0123456789" maxlength="12">
            </div>
          </div>
          
           
          
          <h3>Address</h3>
              
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" name="address" type="text" placeholder="Address">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">District:</label>
            <div class="col-lg-8">
              <input class="form-control" name="district" type="text" placeholder="district">
            </div>
          </div>


            <div class="form-group">
            <label class="col-lg-3 control-label">State:</label>
            <div class="col-lg-8">
              <input class="form-control" name="state" type="text" placeholder="state">
            </div>
          </div>
          
           
          
           <div class="form-group">
            <label class="col-lg-3 control-label">Pin Code:</label>
            <div class="col-lg-8">
              <input class="form-control" name="pin" type="number" placeholder="e.g123456">
            </div>
          </div>
        
             
        
             <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <a href="dashboard.php"><input type="submit" class="btn btn-primary" value="submit" onclick="validateForm()"></a>
              <span></span>
              <input type="button" class="btn btn-default" value="Cancel" onClick="cancelButton()">
            </div>
          </div>
            </div>
        </form>
      </div>
  </div>
</div>
<hr>


<script>
        function validateForm() {
              var fname = document.forms["myform"]["fname"].value;
              if(fname == ""){
              alert("Name must be filled out");
              return false;
              }
          /*var fname = /^[A-za-z]+$/;
          if(document.myform.name.match(fname))
              {
                  return true;
              }
          else {
              alert("meassage");
              return false;
          }*/
                  
            var con = document.forms["myform"]["con"].value;
          if(!/^[0-9]+$/.test(con)){
              alert("please enter only numeric character");
          }
          var con = document.forms["myform"]["con"].value;
          if(con.length<10 || con.length>10){
              alert("Invalid Number");
          }
          var adhaar = document.forms["myform"]["adhaar"].value;
          if(adhaar.length<16 || adhaar.length>16){
              alert("please enter only numeric character");
          }
           var pin = document.forms["myform"]["pin"].value;
          if(!/^[0-9]+$/.test(con)){
              alert("please enter only numeric character");
          }
          var pin = document.forms["myform"]["pin"].value;
          if(pin.length<6 || pin.length>6){
              alert("Please enter Valid Pin Code");
          }
      }

      function cancelButton(){
        window.location.href = "profileEdit.php";
      }
</script>




</body>
</html>