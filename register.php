<html lang="en">
	<head>
	  <title>VolunTimi</title>
	  <link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Neucha|Neuton|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	  <link href="register_style.css" type="text/css" rel="stylesheet">
	 </head>
	
	<body>
	  <div class="container">
	  
	    </br>
	    <img src="image/logo_white.png"  width="95%">
	  
	    <div class="login-box">
		
			<form class="form-signup" action="includes/register.inc.php" method="post">
				<div class="textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" placeholder="Name" name="name" required>
				</div>
				
				<div class="textbox">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<input type="text" placeholder="Email" name="email" required>
				</div>
				
				<div class="textbox">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<input type="text" placeholder="Phone Number" name="phonenumber" required>
				</div>
				 
			
				<div class="textbox">
					<i class="fa fa-users" aria-hidden="true"></i>
					<input type="text" placeholder="Username" name="uname" required>
				</div>	
							
			
				<div class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="Password" name="psw" required>	
				</div>
				
				<p></p>
				<button type="submit" name="register">Register</button>
				<p></p>
			</form>
	    </div>
	  </div>
	</body>
</html>