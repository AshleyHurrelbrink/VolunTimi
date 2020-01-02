<?php
	require "header.php";
?>

<html>
	<head>
		<link href="index_style.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>
		<div class="image">
			<img src="image/background2.jpg" width=100% alt=""/>
			<h2>Together <h2/> 
			<h3>Making a difference</h3>		
		</div>
		<main>
			<?php
				if(isset($_SESSION['id'])){
					
					if($_SESSION['role']=='volunteer'){
						include 'roles/volunteer/volunteer.php';
					}
					else if($_SESSION['role']=='overseer'){
						include 'roles/overseer/overseer.php';
					}
					else if($_SESSION['role']=='admin'){
						include 'roles/admin/admin.php';
					}
					else
						echo '<p>ERROR LOGGING IN </br> CONTACT US AT ahurrelbrink98@yahoo.com</p>';
				}else{
					include 'roles/visitor/visitor.php';
				}
			?>
		</main>
	</body>
	
</html>

<?php
	 require "footer.php";
?>

