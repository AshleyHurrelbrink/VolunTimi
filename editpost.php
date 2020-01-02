<?php
	require "header.php";
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
				<h6>-Edit Post-</h6>
				<?php
					   

					if(isset($_POST['edit'])){
							
						require 'includes/dbh.inc.php';
							
					   
					   $sql = "SELECT * FROM events WHERE id='".$_POST['id']."'";
					   $result = mysqli_query($conn, $sql);
					   $resultCheck = mysqli_num_rows($result);

					   if ($resultCheck > 0) 
					   {
							$row = mysqli_fetch_assoc($result);
					   }
					}
				?>
		
				<form class="contact-form" action="includes/editpost.inc.php" method="post">
				
					<p class="eventName">
						<input type="text" name="eventName" id="eventName" value="<?php echo $row['eventName'];?>">
						<label for="eventName">Event Name</label>
					</p>
					
					<p class="photo">
						<input type="text" name="photo" id="photo" value="<?php echo $row['photo'];?>">
						<label for="photo">Photo</label>
					</p>
					
					<p class="date">
						<input type="text" name="date" id="date" value="<?php echo $row['date'];?>">
						<label for="date">Date</label>
					</p>
					
					<p class="time">
						<input type="text" name="time" id="time" value="<?php echo $row['time'];?>">
						<label for="time">Time</label>
					</p>
					
					<p class="place">
						<input type="text" name="place" id="place" value="<?php echo $row['address'];?>">
						<label for="place">Address</label>
					</p>
					
					<p class="maxnrpeople">
						<input type="text" name="maxnrpeople" id="maxnrpeople" value="<?php echo $row['maxnrpeople'];?>">
						<label for="maxnrpeople">Maximum number of people</label>
					</p>
					
					<button type="submit" name="submit">SAVE</button>
					<input type="hidden" name="idid" value="<?php echo $row['id'];?>"/>
					<input type="hidden" name="nrpeople" value="<?php echo $row['nrpeople'];?>"/>
			    </form>
		
					
			</div>
		</div>
		</main>
	</body>
	
</html>

<?php
	require "footer.php";
?>
