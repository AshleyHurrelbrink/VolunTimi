<?php
	require 'header.php';
?>

<html>
	<head>
		<link href="addpost_style.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>
		<div class="image">
			<img src="image/background2.jpg" width=100% alt=""/>
			<h2>Together <h2/> 
			<h3>Making a difference</h3>		
		</div>
		<main>
			<div class="row">
			
			<div class="info">
			<?php
				include 'roles/userinfo.php';
			?>
			</div>
			
			<div class="events">
				<h6>-New Post-</h6>
		
				<form class="addpost-form" action="includes/addpost.inc.php" method="post">
				
					<p class="eventName">
						<input type="text" name="eventName" id="eventName" placeholder="Spread the Christmas Cheer">
						<label for="eventName">Event Name</label>
					</p>
					
					<p class="photo">
						<input type="text" name="photo" id="photo" placeholder="images\image1.png">
						<label for="photo">Photo</label>
					</p>
					
					<p class="date">
						<input type="text" name="date" id="date" placeholder="14 December 2019">
						<label for="date">Date</label>
					</p>
					
					<p class="time">
						<input type="text" name="time" id="time" placeholder="14:00-15:00">
						<label for="time">Time</label>
					</p>
					
					<p class="place">
						<input type="text" name="place" id="place" placeholder="str.L.Rebreanu nr.20">
						<label for="place">Address</label>
					</p>
					
					<p class="maxnrpeople">
						<input type="text" name="maxnrpeople" id="maxnrpeople" placeholder="20">
						<label for="maxnrpeople">Maximum number of people</label>
					</p>
					
					<button type="submit" name="submit">SUBMIT</button>
			  
				</form>
					
			</div>
		</div>
		</main>
	</body>
	
</html>

<?php
	require 'footer.php';
?>
