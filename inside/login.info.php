<?php
if (isset($_POST['login-submit'])){ #if the login button was pressed in login.php it goes here to input the data and login

	require 'database.php'; #to connect to database

	$email = $_POST['email']; #the info from the first insert box goes here (can be both username and email) to be used as variable
 	$password = $_POST['pass']; #info from second insert box becomes variable

	if (empty($email)|| empty($password)){ #if the person pressed button but did not type anything
		header("Location: ../login.php?emptyinfo&error"); #alerts user in the search box
		exit();
	}
	else {
		$sql = "SELECT * FROM accounts where usernames=? OR emails=?;"; #this is where the checking if the data is correct or not starts
		$statement = mysqli_stmt_init($connection); #connects to the database <accounts> using variable from database.php
		if (!mysqli_stmt_prepare($statement, $sql)) { #if it does not connect to the specified database:
			header("Location: ../login.php?invalid&entry"); #alerts user that it could not connect to database
			exit();
		}
		else{
			mysqli_stmt_bind_param($statement, "ss", $email, $email); #binds the two variables as strings
			mysqli_stmt_execute($statement); 
			$result = mysqli_stmt_get_result($statement);
			if ($row = mysqli_fetch_assoc($result)) { #gets the data to match up with the user's input
				$passcheck = password_verify($password, $row['passwords']);
				if($password != $row['passwords']) { #if password does not match up
					header("Location: ../login.php?wrong&password"); #gives error in header saying wrong password
					exit();
				}
				else if ($password == $row['passwords']){ #password that was entered lines up with database
					session_start(); #creates session for the user - can now login
					$_SESSION['userId'] = $row['id']; #user can login as user
					$_SESSION['username'] = $row['usernames'];
					header("Location: ../home.php"); #goes to next page which is only for users
					exit();
				}
				else {
					header("Location: ../login.php?invalid&password"); #password is incorrect
					exit();
				}
			}
			else {
				header("Location: ../login.php?user&doesnot&exist"); #user was never created / either username or email does not exist
				exit();
			}
		}
	}
}
?>