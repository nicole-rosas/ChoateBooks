<?php
if (isset($_POST['signup-submit'])){ #if button from signup is pressed, go through the process of putting it into database

	require 'database.php'; #to log into the database

	$username = $_POST['username']; #info from the first text box is made into variable for username
	$email = $_POST['email']; #info from second box is variable for email
	$password = $_POST['password']; #becomes variable for password

	if (empty($username) || empty($email) || empty($password)){ #if any of these are empty 
		header("Location: ../signup.php?error=empty&".$username."&email=".$email); #creates error message on top and leaves behind what the user wrote for the username or email if they had put in that information before 
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) { #if both the email was not in email form and if the username did not follow requirements
		header("Location: ../signup.php?error=invaliduser&email"); #gives error in header about both
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { #if only email was not in correct form
		header("Location: ../signup.php?error=invalidemail&username=".$username); #gives error message but reminds you of the username you had put in before
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { #if only the username wasnt in correct format
		header("Location: ../signup.php?error=invalid&email=".$email); #gives error message and gives you the email you had put in
		exit();
	}
	else if(!preg_match("/@choate.edu$/", $email)){ #checks if email domain is correct !!only allows choate.edu email addresses
		header("Location: ../signup.php?error=notcorrect&email&username=".$username); #if not, you will get error that its the wrong domain
		exit();
	}
	else { #finally! close to getting the data into the database
		$sql = "SELECT usernames FROM accounts WHERE usernames=?"; #checks to see if the information can actually work and be put into the database <accounts>
		$statement = mysqli_stmt_init($connection);
		if (!mysqli_stmt_prepare($statement, $sql)) { #if it does not connect and fails
			header("Location: ../signup.php?sql&error"); #error message, this would be out of the users hands
		exit();
		}
	else {
		mysqli_stmt_bind_param($statement, "s",$username); #binds the username to be a string and to the $statement to be sent to the database
		mysqli_stmt_execute($statement); #pass the data to the database and searches for the match
		mysqli_stmt_store_result($statement);
		$check = mysqli_stmt_num_rows($statement); #sees how many results there are which means somenone already has the username which is bad
		if ($check > 0) { #username was taken
			header("Location: ../signup.php?error&username&taken&email=".$email); #error, already made username. gives back email
			exit();
		}
		else { #information can now be stored to database
			$sql = "INSERT INTO accounts (usernames, emails, passwords) VALUES (?,?,?)"; #data goes into their respective field in the database
			$statement = mysqli_stmt_init($connection); #checkes if the information can actually be entered into the database
			if (!mysqli_stmt_prepare($statement, $sql)) {
				header("Location: ../signup.php?error&invalidaccount");
				exit();
			}
			else { 
				mysqli_stmt_bind_param($statement, "sss", $username, $email, $password); #makes the varaibles into strings for the database
				mysqli_stmt_execute($statement);
				mysqli_stmt_store_result($statement); #is now saved to database!
				header("Location: ../login.php?signupsuccess"); #returns back to login page to login with new account
				exit();
				}
			}
		}
	}
	mysqli_stmt_close($statement);
	mysqli_close($connection);
}
else {
	header("Location: ../signup.php");
}

?>