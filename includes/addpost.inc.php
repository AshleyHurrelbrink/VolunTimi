<?php

	if(isset($_POST['submit'])){
		
		require 'dbh.inc.php';
		
		$eventName=$_POST['eventName'];
		$photo=$_POST['photo'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$address=$_POST['place'];
		$maxnrpeople=$_POST['maxnrpeople'];
		$nrpeople=0;
		
	
	
			$sql="SELECT eventName FROM events WHERE eventName=?";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../addpost.php?error=sqlerror");
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt, "s", $eventName);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck=mysqli_stmt_num_rows($stmt);
				if($resultCheck>0){
					header("Location: ../addpost.php?error=eventNametaken");
					exit();
				}
				else{
					$sql="INSERT INTO events(photo, eventName, date, time, address, nrpeople, maxnrpeople) VALUES (?,?,?,?,?,?,?)";
					$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: ../addpost.php?error=sqlerror");
						exit();
					}
					else{
						mysqli_stmt_bind_param($stmt, "sssssss", $photo, $eventName, $date, $time, $address, $nrpeople, $maxnrpeople);
						mysqli_stmt_execute($stmt);
						header("Location: ../addpost.php?addpost=success");
						exit();
					}
					
				}
			}
		
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		
	}else{
		header("Location: ../index.php");
		exit();
	}