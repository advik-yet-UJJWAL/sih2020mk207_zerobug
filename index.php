<?php include 'includes/dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HOME</title>
  
  
  <link rel="stylesheet" href="css/index.css"> 

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>


<body>

  <nav class="navbar navbar-dark bg-secondary">
  <a class="navbar-brand" style="color:#0A79DF;"><img src="images/logo.png" alt="SEWA" style="width:50px;height:55px;margin-left:50px"></a>
  <div class="container-fluid-nav text-center">
      <h4>ZerobugPAS</h4>
    </div>
  <form class="form-inline">
    <a href="#" class="btn btn-outline-primary" type="submit">AboutUs</a>&nbsp;
    <a href="signUp.php" class="btn btn-outline-primary" type="submit">SignUp/LogIn</a>
  </form>
</nav>
  
  
   <div class="row">
       <div class="col-md-12 ">
           <img src="images/lnd_img1.jpg" height="600px" width="100%" alt="Landing Banner">
       </div>








       
       
   </div>
    <section class="wrapper">
    <div class="container-fostrap">
        
        <div class="content">
            <div class="container">
			<h1>Featured Services</h1><br>
                <div class="row">
				<?php
				$sql = "SELECT * FROM schemes WHERE isfeatured = 1 LIMIT 6";
				$result = $con->query($sql);
				while($record = $result->fetch_assoc()) {
				?>
				
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="<?php echo $record["schemeurl"]; ?>">
                            <img src="https://1.bp.blogspot.com/-Bii3S69BdjQ/VtdOpIi4aoI/AAAAAAAABlk/F0z23Yr59f0/s640/cover.jpg" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="<?php echo $record["schemeurl"]; ?>"> <?php echo $record["schemename"]; ?>
                                  </a>
                                </h4>
                                <p class="">
                                   <?php echo $record["schemedesc"]; ?>
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="<?php echo $record["schemeurl"]; ?>" class="btn btn-link btn-block">
                                    Apply
                                </a>
                            </div>
                        </div>
                        
                    </div>
				<?php  } ?>
                </div>
                <center><a href="signUp.php" type="button" class="btn btn-primary btn-lg">Explore More Services</a></center>
            </div>
        </div>
    </div>
</section>
  
   

   
    
</body>

<scipt>
<!--
    $(".dropdown-menu li a").click(function(){
  $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
  $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
})
-->
    
</scipt>
</html>