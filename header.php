<?php
	session_start();
?>


<html>
	<head>
		<title>VolunTimi</title>
		<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Neucha|Neuton|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	    <link href="header_style.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>
		<header>
		   
			<img src="image/logo_black.png" width="300" height="80" class="image">
			
			<nav>
			  
				<a href="index.php">Home</a>
				<a href="about.php">About</a>
				<a href="contact.php">Contact</a>
					<?php
						if(isset($_SESSION['id'])){
							echo '<a>
								<form action="includes/logout.inc.php" method="post">
									<button type="submit" name="logout">Logout</button>
									</form>
								</a>';
						}else{
							echo '<a href="login.php">Login</a>';
						}
					?>
				
			</nav>
		</header>
	</body>
</html>

