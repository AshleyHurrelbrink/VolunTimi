
<html lang="en">
	<head>
	  <title>VolunTimi</title>
	  <link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Neucha|Neuton|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	  <link href="login_style.css" type="text/css" rel="stylesheet">
	 </head>
	
	<body>
	  <div class="container">
	  
	    </br>
	    <img src="image/logo_white.png"  width="95%">
	  
	    <div class="login-box">
			<form class="form-signup" action="includes/login.inc.php" method="post">
				<div class="textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" placeholder="Username" name="uname" required>
				</div>	
			
				<div class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="Password" name="psw" required>	
				</div>
				
				<p></p>
				<button type="submit" name="login">Login</button>
			</form>
			
			<p>Don't have an account?</p>
			<a class="semi-transparent-button" href="register.php"> Sign Up</a>
	        <p></p>
	    </div>
	  </div>
	</body>
</html>