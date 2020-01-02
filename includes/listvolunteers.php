<?php 
	require 'C:\xampp\htdocs\VolunTimi\includes\dbh.inc.php';
	require "header.php";
?>

<html>

	<head>
		<title>VolunTimi</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Neucha|Neuton|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	    <link href="listvolunteers_style.css" type="text/css" rel="stylesheet">
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
				
				
				<div class="volunteers">
							
						<?php 
						
						   if(isset($_GET['eventID'])){
							   $eventID=$_GET['eventID'];
							   echo "<b>--$eventID--</b>";
						   }else{
								$eventID=$_POST['id'];
								echo "<b>--$eventID--</b>";
						   }
						   
						   $sql = "SELECT * FROM events WHERE id='$eventID';";
						   $event=mysqli_fetch_assoc(mysqli_query($conn, $sql));
						   echo "<b>".$event['eventName']."</b>";
						   
						   $sql = "SELECT * FROM attendance WHERE eventID='$eventID';";
						   $result = mysqli_query($conn, $sql);
						   $resultCheck = mysqli_num_rows($result);
						   

						   if ($resultCheck > 0) 
						   {
							while ($row = mysqli_fetch_assoc($result))
							{
								
								$sql = "SELECT * FROM users WHERE id='".$row['userID']."';";
								$user=mysqli_fetch_assoc(mysqli_query($conn, $sql));
				
								  echo  "<table style=\"width:100%\">
											<tr id=\"head\">
												<th>NAME</th>
												<th>PHONE NUMBER</th>
												<th>STATUS</th>
												<th>ATTENDANCE</th>
											</tr>
											<tr id=\"body\">
												<td>".$user['name']."</td>
												<td>".$user['phoneNumber']."</td>
												<td>".$row['attendance']."</td>
												
												<td>
													<div class=\"flex\" style=\"width:100%\">";
														if($row['attendance']=="unknown")
														{
														echo "<form class=\"action-form\" action=\"includes/overseer.inc.php\" method=\"post\">
															<button type=\"submit\" name=\"yes\">YES</button>
															<input type=\"hidden\" name=\"attendanceID\" value='".$row['id']."'/>
															<input type=\"hidden\" name=\"userID\" value='".$row['userID']."'/>
															<input type=\"hidden\" name=\"eventID\" value='".$eventID."'>
														</form>
														<form class=\"action-form\" action=\"includes/overseer.inc.php\" method=\"post\">
															<button type=\"submit\" name=\"no\">NO</button>
															<input type=\"hidden\" name=\"attendanceID\" value='".$row['id']."'/>
															<input type=\"hidden\" name=\"userID\" value='".$row['userID']."'/>
															<input type=\"hidden\" name=\"status\" value='".$user['status']."'/>
															<input type=\"hidden\" name=\"eventID\" value='".$eventID."'>
														</form>";
														}else{
															if($row['attendance']=="attended"){
															echo "<form class=\"action-form\" action=\"includes/overseer.inc.php\" method=\"post\">
															<button type=\"submit\" name=\"no\">NO</button>
															<input type=\"hidden\" name=\"attendanceID\" value='".$row['id']."'/>
															<input type=\"hidden\" name=\"userID\" value='".$row['userID']."'/>
															<input type=\"hidden\" name=\"status\" value='".$user['status']."'/>
															<input type=\"hidden\" name=\"eventID\" value='".$eventID."'>
														</form>";
															}
															if($row['attendance']=="missed"){
																echo "<form class=\"action-form\" action=\"includes/overseer.inc.php\" method=\"post\">
															<button type=\"submit\" name=\"yes\">YES</button>
															<input type=\"hidden\" name=\"attendanceID\" value='".$row['id']."'/>
															<input type=\"hidden\" name=\"userID\" value='".$row['userID']."'/>
															<input type=\"hidden\" name=\"eventID\" value='".$eventID."'>
														</form>";
															}
														}
															
																										
													echo "</div>
												</td>
											</tr>
											</table>";
							}
						   }
						 ?>
				</div>
				
			</div>
		</main>
	</body>
</html>

<?php
	require "footer.php";
?>