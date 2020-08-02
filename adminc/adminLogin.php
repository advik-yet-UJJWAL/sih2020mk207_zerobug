<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin LogIn</title>
    
    <link rel="stylesheet" href="css/signUp.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js"></script> -->

</head>
<body>
   <div class="container">
           <img src="images/signup_illustration.png"/>
   <div class="login-wrap">
	<div class="login-html">
        <div class="tab">Admin Log In</div>
		<div class="login-form"> 
		  <form action="" method="post">
                <div>
                    <div class="group">
                        <label for="user" class="label">Id</label>
                        <input id="user" type="text" class="input" name="id">
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
                        <input type="submit" class="button" value="Sign In" name="login">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
			</form>
		</div>
	</div>
</div>

    </div>

</body>
</html>