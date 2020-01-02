<?php

	if(isset($_POST['yes'])){
		
		require 'dbh.inc.php';
		$eventID=$_POST['eventID'];
		$userID=$_POST['userID'];
		$attendanceID=$_POST['attendanceID'];
		$attended="attended";
		$status=0;
		
					$sql = "UPDATE users SET status='$status' WHERE id='$userID'";
					$stmt=mysqli_stmt_init($conn);
					if (!mysqli_query($conn, $sql)) {
						header("Location: ../index.php?error");
						exit();
					}
		
					$sql = "UPDATE attendance SET attendance='$attended' WHERE id='$attendanceID'";
					$stmt=mysqli_stmt_init($conn);
					if (mysqli_query($conn, $sql)) {
						header("Location: ../listvolunteers.php?eventID=".$eventID);
						exit();
					}else{
						header("Location: ../index.php?error");
						exit();
					}
					

					
					
					
		mysqli_stmt_close($stmt);
		mysqli_close($conn);	
	}else{
		
		if(isset($_POST['no'])){
		
		require 'dbh.inc.php';
		$eventID=$_POST['eventID'];
		$userID=$_POST["userID"];
		$attendanceID=$_POST["attendanceID"];
		$status=$_POST["status"]+1;
		$missed="missed";
		
		
					$sql = "UPDATE users SET status='$status' WHERE id='$userID'";
					$stmt=mysqli_stmt_init($conn);
					if (!mysqli_query($conn, $sql)) {
						header("Location: ../index.php?error");
						exit();
					}
		
					$sql = "UPDATE attendance SET attendance='$missed' WHERE id='$attendanceID'";
					if (mysqli_query($conn, $sql)) {
						header("Location: ../listvolunteers.php?eventID=".$eventID);
						exit();
					}else{
						header("Location: ../index.php?error");
						exit();
					}
					
				
						
			mysqli_stmt_close($stmt);
			mysqli_close($conn);	
		}else{
			header("Location: ../index.php");
			exit();
		}
	}
		
	