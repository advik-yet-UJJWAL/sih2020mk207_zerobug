<?php 
  
  
    
         $email = $password ="";
            
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $email = $_POST["email"];
                $password = $_POST["password"];
                
                
                $servername = "localhost";
                $username = "root";
                $dbname = "zerobug";
                
                $conn = new mysqli($servername, $username,null,$dbname);
                
                if($conn->connect_error){
                    die("Connection failed:".$conn->connect_error);
                }
                
                $sql = "SELECT * FROM user_details WHERE email ='".$email."' AND password = '".$password."'";
                
                $result = $conn->query($sql);
                
                if($result->num_rows>0){
                    $record = $result->fetch_assoc();
                    session_start();
                     
                    $_SESSION["loggedInUserId"] = $record["id"];
                    $_SESSION["loggedIn"] = true;
                    
//                    echo "LogIn Successful";
//                    var_dump($record);
                    
                     header("Location:myDashboard.php");
                }else{
                    
                    echo "<script>
                            alert('Invalid email or password. Please login again');
                            window.location.href='index.php';
                          </script>";
//                    echo "Invalid Credential";

                }
            }








   
// if(isset($_POST["submit"])){
//     if(!empty($_POST['login_email']) && !empty($_POST['login_password'])){
//             $email = $_POST['login_email'];
//             $pass = $_POST['login_password'];
//         //DB Connection
//             $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
//         //Select DB From database
//             $db = mysqli_select_db($conn, 'sewa') or die("databse error");
//         //Selecting database
//             $query = mysqli_query($conn, "SELECT * FROM user_details WHERE email='".$email."' AND password='".$pass."'");
//             $numrows = mysqli_num_rows($query);
//             echo "here";
//             if($numrows !=0)
//             {
//                while($row = mysqli_fetch_assoc($query))
//                {
//                     $dbemail=$row['email'];
//                     $dbpassword=$row['pass'];
//                }
//
//                if($email == $dbemail && $pass == $dbpassword)
//                {
//                     session_start();
//                     $_SESSION['sess_user']=$user;
//                    
//                     //Redirect Browser
//                     header("Location:myDashboard.php");
//                }
//             }
//
//             else
//                {
//                    echo "Invalid Username or Password!";
//                }
//     }
//     else
//     {
//        echo "Required All fields!";
//     }
//}

//**********************************************************************
//   $servername = "localhost";
//   $username = "root";
//   $dbname = "sewa";
//
//   $conn = mysqli_connect($servername, $username,null,$dbname);
//
//   if($_SERVER["REQUEST_METHOD"] == "POST") {       
//       $login_email = $_POST["login_email"];
//       $login_password = $_POST["login_password"];
//       $count = '';
//       
//       if($conn->connect_error){
//             die("Connection Failed:".$conn->connect_error);
//        }
//       
//       $sql = "SELECT * FROM user_details WHERE username = '$login_email' and password = '$login_password'";
//
//        $result = mysqli_query($conn,$sql);
//        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $active = $row['active'];
//        echo $count;
//
//        if($count>0) {
//           session_register("login_email");
//           $_SESSION['login_email'] = $login_email;
//           echo $result;
//           //header("location: myDashboard.php");     
//        }else {
//           $error = "Your Email-id or Password is invalid";
//        }
   
?>