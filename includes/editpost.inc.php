<?php

	if(isset($_POST['submit'])){
		
		require 'dbh.inc.php';
		
		$id=$_POST['idid'];
		$eventName=$_POST['eventName'];
		$photo=$_POST['photo'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$address=$_POST['place'];
		$maxnrpeople=$_POST['maxnrpeople'];
		$nrpeople=$_POST['nrpeople'];
		$s='notsaved';
			    if($maxnrpeople<$nrpeople){
					header("Location: ../index.php?s=$s");
					exit();
					
				}else{
					$sql = "UPDATE events SET photo='$photo', eventName='$eventName', date='$date', time='$time', address='$address', maxnrpeople='$maxnrpeople' WHERE id='$id'";
					if (mysqli_query($conn, $sql)) {
						header("Location: ../index.php");
						exit();
					}else{
						header("Location: ../editpost.php?errorsql");
						exit();
					}
				}
			
			
			
			mysqli_close($conn);
			header("Location: ../editpost.php?errorsql");
			exit();
		
		
	}else{
		header("Location: ../roles/admin/admin.php");
		exit();
	}