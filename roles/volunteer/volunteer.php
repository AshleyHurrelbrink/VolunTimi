<?php 
	require 'C:\xampp\htdocs\VolunTimi\includes\dbh.inc.php';
?>

<html>

	<head>
		<title>VolunTimi</title>
		<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Neucha|Neuton|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	    <link href="roles/volunteer/volunteer_style.css" type="text/css" rel="stylesheet">
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
					   $userID=$_SESSION['id'];	
					   $userStatus=$_SESSION['status'];	
					   if ($resultCheck > 0) 
					   {
						while ($row = mysqli_fetch_assoc($result))
						{   
							$peopleleft=$row['maxnrpeople']-$row['nrpeople'];
							
							$sql = "SELECT * FROM attendance WHERE userID='$userID' AND eventID='".$row['id']."'";
							$result2 = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result2);
							$row2 = mysqli_fetch_assoc($result2);
							
							if(($peopleleft>0||$resultCheck>0)&&($resultCheck<=0||$row2['attendance']=="unknown")){
								if($resultCheck>0){
									echo  "<div class=\"row2\" style=\"background-color:#FAF0E6;\">";
								}else{
									echo  "<div class=\"row2\">";
								}
										echo "<div class=\"col\">
												<img src=".$row['photo']." width=100%>";
													$sql = "SELECT * FROM attendance WHERE eventID='".$row['id']."' AND userID='".$userID."';";
													$result2 = mysqli_query($conn, $sql);
													$resultCheck = mysqli_num_rows($result2);
													if ($resultCheck > 0) {
														echo"<form class=\"action-form\" action=\"includes/volunteeraction.inc.php\" method=\"post\">
															<button type=\"submit\" name=\"cancel\">Cancel</button>
															<input type=\"hidden\" name=\"id\" value=".$row['id']."/>
															<input type=\"hidden\" name=\"nrpeople\" value=".$row['nrpeople']."/>
															<input type=\"hidden\" name=\"userID\" value=".$userID."/>
														</form>";
													}else{	                         
														echo"<form class=\"action-form\" action=\"includes/volunteeraction.inc.php\" method=\"post\">
															<button type=\"submit\" name=\"attend\">Attend</button>
															<input type=\"hidden\" name=\"id\" value=".$row['id']."/>
															<input type=\"hidden\" name=\"nrpeople\" value=".$row['nrpeople']."/>
															<input type=\"hidden\" name=\"userID\" value=".$userID."/>
															<input type=\"hidden\" name=\"userStatus\" value=".$userStatus."/>
														</form>";
													}
												echo
												
											"</div>
											<div class=\"col2\">";
												if($resultCheck>0){
													echo  "<b style=\"background-color:#FAF0E6;\">".$row['eventName']."</b>";
												}else{
													echo  "<b>".$row['eventName']."</b>";
												}
												
												echo" <h5>When?</h5>
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
					   }

					
					 ?>
			</div>
		</div>
	</body>
</html>