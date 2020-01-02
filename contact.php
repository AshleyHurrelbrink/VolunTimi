<?php
	require "header.php";
?>


<html lang="en">
	<head>
	  <title>About</title>
	  <link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Neucha|Open+Sans|Neuton|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	  <link href="contact_style.css" type="text/css" rel="stylesheet">
	 </head>
	
	<body>
	
	  <div class="image">
			<img src="image/contact.jpg" width=100% alt=""/>
			<h1>Contact</h1>		
	  </div>
	  
	  <div class="container">
		
		<h6>Need a volunteering crew?</br>Let us know!</h6>
		
		<form class="contact-form" action="includes/contact.inc.php" method="post">
		
			<p class="name">
				<input type="text" name="name" id="name" placeholder="John Doe">
				<label for="name">Name</label>
			</p>
			
			<p class="email">
				<input type="text" name="email" id="email" placeholder="mail@example.com">
				<label for="email">Email</label>
			</p>
			
			<p class="phone">
				<input type="text" name="phone" id="phone" placeholder="07xxxxxxxx">
				<label for="phone">Phone Number</label>
			</p>
			
			<p class="date">
				<input type="text" name="date" id="date" placeholder="07 june 2020">
				<label for="date">Date</label>
			</p>
			
			<p class="time">
				<input type="text" name="time" id="time" placeholder="14:30-15:30">
				<label for="time">Time</label>
			</p>
			
			<p class="place">
				<input type="text" name="place" id="place" placeholder="str.L.Rebreanu nr.20">
				<label for="place">Address</label>
			</p>
			
			<p class="nrpeople">
				<input type="text" name="nrpeople" id="nrpeople" placeholder="20">
				<label for="nrpeople">Maximum number of people</label>
			</p>
			
			<p class="text">
					<textarea name="text" placeholder="Write something to us"></textarea>
			</p>
			
			<button type="submit" name="submit">SUBMIT</button>
	  
		
		
	  </div>
	 
	</body>
</html>


<?php
	 require "footer.php";
?>