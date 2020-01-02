<?php

	if(isset($_POST['register'])){
		
		require 'dbh.inc.php';
		
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phonenumber=$_POST['phonenumber'];
		$username=$_POST['uname'];
		$password=$_POST['pwd'];
		$role="volunteer";
		$status=0;
		
		/*if(empty($name)||empty($email)||empty($phonenumber)||empty($username)||empty($password)){
			header("Location: ../register.php?error=emptyfield&name=".$name."&email=".$email."&phonenumber=".$phonenumber);
			exit();
		}
		else */
		
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/",$username)){
			header("Location: ../register.php?error=invalidmailuid&name=".$name);
			exit();
			
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("Location: ../register.php?error=invalidmail&name=".$name."&phonenumber=".$phonenumber);
			exit();
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
			header("Location: ../register.php?error=invaliduid&name=".$name."&email=".email."&phonenumber=".$phonenumber);
			exit();
		}
		else if($password !== $password){
			header("Location: ../register.php?error=passwordcheck&name=".$name."&email=".email."&phonenumber=".$phonenumber);
			exit();
		}
		else{
			$sql="SELECT username FROM users WHERE username=?";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../register.php?error=sqlerror");
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck=mysqli_stmt_num_rows($stmt);
				if($resultCheck>0){
					header("Location: ../register.php?error=usertaken&mail=".$email);
					exit();
				}
				else{
					$sql="INSERT INTO users(name, email, phoneNumber, username, password, role, status) VALUES (?,?,?,?,?,?,?)";
					$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: ../register.php?error=sqlerror");
						exit();
					}
					else{
						$hashedPwd=password_hash($password,PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $phonenumber, $username, $hashedPwd, $role, $status);
						mysqli_stmt_execute($stmt);
						header("Location: ../login.php?signup=success");
						exit();
					}
					
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		
	}
	else{
		header("Location: ../login.php");
		exit();
	}