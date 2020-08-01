 <?php include 'includes/dbconfig.php'; ?>
                   <?php
                    session_start(); 
                    if(isset($_SESSION["loggedIn"])) {
                       
                            $id = $_SESSION["loggedInUserId"];
                            $stateid = base64_decode($_GET["stateid"]);
                            $categoryid = base64_decode($_GET["categoryid"]);
                        
                        }
                        else{
                            
                            header("location: index.php");
                        }
                    
                        ?>
                        <?php
$sql = "SELECT * FROM schemes WHERE stateid = '$stateid' AND categoryid = '$categoryid' ORDER BY schemeid DESC";
$result = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Schemes</title>
    
    <link rel="stylesheet" href="css/scheme.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
   
   
   <nav class="navbar navbar-expand-lg" style="background-color: #192a56;">
      <a class="navbar-brand" style="color: white; text-decoration: none;" href="">SEWA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
              
          <li class="nav-item active">
            <a class="nav-link" style="color: white; text-decoration: none; margin-left: 1600%;" href="logout_config.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>


        <header>
            <div id="head">
                <h2>Selected Services</h2>
            </div>
        </header>
    
   
  
   <section class="wrapper">
    <div class="container-fostrap">
       
        
        <div class="content">
            <div class="container">
               
                <div class="row">
                   
                   <?php
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
                    
                    <?php } ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
   
   
    
</body>
</html>