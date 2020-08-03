<?php 

   $servername = "localhost";
   $username = "root";
   $dbname = "zerobug";

   $conn = mysqli_connect($servername, $username,null,$dbname);

   require 'includes/PHPmailer.php';
   require 'includes/SMTP.php';
   require 'includes/Exception.php';


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
           
       $firstName = $_POST["first_name"];
       $firstName= strip_tags($firstName);
       $firstName= mysqli_real_escape_string($conn,trim($firstName));
       $lastName = $_POST["last_name"];
       $lastName= strip_tags($lastName);
       $lastName= mysqli_real_escape_string($conn,trim($lastName));
       $email = $_POST["email"];
       $email = strip_tags($email);
       $email = mysqli_real_escape_string($conn , trim($email));
       $password = $_POST["password"];
       $phone = $_POST['phone'];
       $password= password_hash($password,PASSWORD_BCRYPT);
       
   
   
      if($conn->connect_error){
             die("Connection Failed:".$conn->connect_error);
        }


       $sql = "INSERT INTO user_details (first_name,last_name,email,`password`,phone,`isUpdated`)
         VALUES('".$firstName."','".$lastName."','".$email."','".$password."','".$phone."','false')";

         $to = $email;
         $subject = "Registered Successfully ";
         $message = "Hi ".$firstName."You are successfullt registered with us via".$email.".";
         $header = "From: Team Zerobug";
         

       if($conn->query($sql)){

              
            

              
              // Load Composer's autoloader
              // require 'vendor/autoload.php';
              
              // Instantiation and passing `true` enables exceptions
              $mail = new PHPMailer(true);
              
              try {
                  //Server settings
                  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                  $mail->isSMTP();                                            // Send using SMTP
                  $mail->Host       = 'in-v3.mailjet.com';                    // Set the SMTP server to send through
                  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                  $mail->Username   = '9c4a1759372f589a99f2901da796f56a';                     // SMTP username
                  $mail->Password   = '3c59e4d21f4d76aa34646203785e62f3';                               // SMTP password
                  $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                  $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
              
                  //Recipients
                  $mail->setFrom('anshuman852@gmail.com', 'Zerobug');
                  $mail->addAddress($email, $firstName);     // Add a recipient
                  // $mail->addAddress('ellen@example.com');               // Name is optional
                  // $mail->addReplyTo('info@example.com', 'Information');
                  // $mail->addCC('cc@example.com');
                  // $mail->addBCC('bcc@example.com');
              
                  // Attachments
                  // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
              
                  // Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->Subject = $to;
                  $mail->Body    = $message;
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              
                  $mail->send();
                  echo '<script>alert("Register Successful. Please LogIn");
                                 window.location.href="signUp.php";</script>';
                  
              } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }



                        //   ini_set('SMTP', "in-v3.mailjet.com");
                        //   ini_set('smtp_port', "25");
                        //   ini_set('sendmail_from', "riturajbandha8@outlook.com");

                        //  if(mail($to,$subject,$message,$header)){
                        //    echo "Sent Successfully";
                        //  }else{
                        //    echo "Something wrong";
                        //  }
                         

                        //  header("Location:index.php");
                         
                     }else{
                         echo"Error".$sql."<br>".$conn->error;
                     }
   }
//   if($_SERVER["REQUEST_METHOD"] == "POST") {
//      // username and password sent from form 
//      
//      $myemail = mysqli_real_escape_string($db,$_POST['email']);
//      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
//      
//      $sql = "SELECT * FROM user_details WHERE username = '$myemail' and password = '$mypassword'";
//      $result = mysqli_query($db,$sql);
//      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//      $active = $row['active'];
//      
//      $count = mysqli_num_rows($result);
//      
//      // If result matched $myusername and $mypassword, table row must be 1 row
//		
//      if($count>0) {
//         session_register("myemail");
//         $_SESSION['loggedIn_email'] = $myemail;
////         echo $result;
////        header("location: myDashboard.php");
//          
//      }else {
//         $error = "Your Login Name or Password is invalid";
//      }
//   }

?>