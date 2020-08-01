<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up/ Log in</title>
    
    <link rel="stylesheet" href="css/signUp.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js"></script> -->

</head>
<body>
   
   <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		
		<div class="login-form"> 
		  <form action="login_config.php" method="post">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Email Id</label>
                        <input id="user" type="text" class="input" name="email">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
			</form>
			<form action="signup_config.php" method="post">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">First Name</label>
                        <input id="user" type="text" class="input" name="first_name" >
                    </div>
                    <div class="group">
                        <label for="user" class="label">Last Name</label>
                        <input id="user" type="text" class="input" name="last_name" >
                    </div>
                    <div class="group">
                        <label for="user" class="label">Email Id</label>
                        <input id="user" type="text" class="input" name="email" >
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password" >
                    </div>
                    <div class="group">
                        <label for="phone" class="label">Phone No</label>
                        <input id="phone" type="tel" class="input" maxlength="10"name="phone" >
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up" onclick="sweetAlertSuccess()">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </div>
			</form>
		</div>
	</div>
</div>
    

    <!-- <script>
        function sweetaAlertSuccess{
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
        }
    </script> -->



</body>
</html>