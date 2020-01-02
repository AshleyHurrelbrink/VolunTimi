<?php

	if(isset($_POST['login'])){
		
		require 'dbh.inc.php';
		
		$username=$_POST['uname'];
		$password=$_POST['pwd'];
		
		
			$sql="SELECT * FROM users WHERE username=?;";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../login.php?error=sqlerror");
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt, "s",$username);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				if($row=mysqli_fetch_assoc($result)){
					$pwdcheck=password_verify($password, $row['password']);
					if($pwdcheck ==false){
						header("Location: ../login.php?error=wrongpassword");
						exit();
					}
					else if($pwdcheck == true){
						
						session_start();
						$_SESSION['id']=$row['id'];
						$_SESSION['name']=$row['name'];
						$_SESSION['phoneNumber']=$row['phoneNumber'];
						$_SESSION['email']=$row['email'];
						$_SESSION['username']=$row['username'];
						$_SESSION['role']=$row['role'];
						$_SESSION['status']=$row['status'];
						header("Location: ../index.php?login=success");
						exit();
					}
					else{
						header("Location: ../login.php?error=wrongpassword");
						exit();
					}
				}
				else{
					header("Location: ../login.php?error=nouser");
					exit();
				}
			}
				
		
	}
	else{
		header("Location: ../index.php");
		exit();
	}