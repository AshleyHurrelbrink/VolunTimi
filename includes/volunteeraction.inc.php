<?php

	if(isset($_POST['attend'])){
		
		require 'dbh.inc.php';
		$userID=$_POST['userID'];
		$eventID=$_POST['id'];
		$nrpeople=$_POST['nrpeople']+1;
		$status=$_POST['userStatus'];
		$limit=5;
		$attendance='unknown';
		
					if($status>$limit){
						header("Location: ../index.php?accountDisabled");
						exit();
					}
		
					$sql="INSERT INTO attendance(userID, eventID, attendance) VALUES (?,?,?)";
					$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: ../index.php?error=sqlerror");
					}
					else{
						mysqli_stmt_bind_param($stmt, "sss", $userID, $eventID, $attendance);
						mysqli_stmt_execute($stmt);
						header("Location: ../index.php?editpost=success");
					}
					
					$sql="UPDATE events SET nrpeople='$nrpeople' WHERE id='$eventID'";
						if (mysqli_query($conn, $sql)) {
							header("Location: ../index.php?successupdate");
							exit();
						}else{
							header("Location: ../index.php?errorsql");
							exit();
						}
					
					
					
		mysqli_stmt_close($stmt);
		mysqli_close($conn);	
	}else{
		
		if(isset($_POST['cancel'])){
		
			require 'dbh.inc.php';
			$userID=$_POST['userID'];
			$eventID=$_POST['id'];
			$nrpeople=$_POST['nrpeople']-1;
						
						$sql = "DELETE FROM attendance WHERE eventID='$eventID' AND userID='$userID'";

						if ($conn->query($sql) === TRUE) {
							header("Location: ../index.php?Record deleted successfully");
						} else {
							echo "Error deleting record: " . $conn->error;
						}
									
						$sql="UPDATE events SET nrpeople='$nrpeople' WHERE id='$eventID'";
						if (mysqli_query($conn, $sql)) {
							header("Location: ../index.php?success");
							exit();
						}else{
							header("Location: ../index.php?errorsql");
							exit();
						}
						
			mysqli_stmt_close($stmt);
			mysqli_close($conn);	
		}else{
			header("Location: ../index.php");
			exit();
		}
	}
		
	