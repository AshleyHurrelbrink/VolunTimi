<?php 
	require 'C:\xampp\htdocs\VolunTimi\includes\dbh.inc.php';
?>

<html>

	<head>
		<title>VolunTimi</title>
		<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Neucha|Neuton|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	    <link href="roles/overseer/overseer_style.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>
		<div class="row">
			
			<div class="info">
			<?php
				include 'roles/userinfo.php';
			?>
			</div>
			
			
			<div class="events">
						
					<?php 
					   $sql = "SELECT * FROM events;";
					   $result = mysqli_query($conn, $sql);
					   $resultCheck = mysqli_num_rows($result);

					   if ($resultCheck > 0) 
					   {
						while ($row = mysqli_fetch_assoc($result))
						{
							$peopleleft=$row['maxnrpeople']-$row['nrpeople'];
							echo  "<div class=\"row2\">
										
										<div class=\"col\">
											<img src=".$row['photo']." width=100%>
											
	                                            
												<form class=\"action-form\" action=\"listvolunteers.php\" method=\"post\">
													<button type=\"submit\" name=\"attendance\">Attendance</button>
													<input type=\"hidden\" name=\"id\" value='".$row['id']."'/>
												</form>
											
										</div>
										<div class=\"col2\">
										    <b>".$row['eventName']."</b>
											<h5>When?</h5>
											<p>".$row['date']."</p>
											<p>".$row['time']."</p>
													
											<h5>Where?</h5>
											<p>".$row['address']."</p>
													
											<h5>Number of places left</h5> 
											<p>".$peopleleft."</p>
											
										</div>
										
								   </div>";
						}
					   }

					
					 ?>
			</div>
		</div>
	</body>
</html>