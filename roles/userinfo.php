<html>

	<head>
		<title>VolunTimi</title>
		<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Neucha|Neuton|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	    <link href="roles/userinfo_style.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>

		<div class="user-info">
		    <img src="image/user.jpg">
		    <h5>Name</h5>
			<p><?php echo $_SESSION['name'];?></p>
			
			<h5>Username</h5>
			<p><?php echo $_SESSION['username'];?></p>
			
			<h5>Email</h5>
			<p><?php echo $_SESSION['email'];?></p>
			
			<h5>Phone Number</h5> 
			<p><?php echo $_SESSION['phoneNumber'];?></p>
			
			<h5>ROLE</h5>
			<p><?php echo $_SESSION['role'];?></p>	

			<h5>Status</h5>
			<p><?php echo $_SESSION['status'];?></p>
			<?php
				if($_SESSION['status']>5){
					echo '<b>!!!ACOUNT DISABLED!!!</br> You have exceeded the maximum number of misses. In order to regain access to your acount please contact us at ahurrelbrink98@yahoo.com</b>';
				}
				if(isset($_GET['s'])){
					echo "<b>!!!EDIT NOT SAVED!!!</br>MAXIMUM NUMBER OF PEOPLE CAN NOT BE SMALLER THAN THE NUMBER OF PEOPLE ALREADY ATTENDING</b>";
				}
			?>
		</div>	
	</body>
</html>