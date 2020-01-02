<?php

	if(isset($_POST['delete'])){
		
		require 'dbh.inc.php';
		
				// sql to delete a record
			
		$sql = "DELETE FROM events WHERE id='".$_POST['id']."'";

		if ($conn->query($sql) === TRUE) {
			header("Location: ../index.php?Record deleted successfully");
		} else {
			echo "Error deleting record: " . $conn->error;
		}

		
		mysqli_close($conn);
		
	}else{
		header("Location: ../index.php");
		exit();
	}
	
?>