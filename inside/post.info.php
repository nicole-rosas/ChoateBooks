<?php
if (isset($_POST['post-submit'])){ #if button is pressed to make post, go through process of putting in the data to database

	require 'database.php'; #connect to database

	$title = $_POST['title']; #this is the data that the user inputed that turns into variables
	$author = $_POST['author'];
	$desc = $_POST['description'];
	$class = $_POST['class'];
	$email = $_POST['email'];

	$name = $_FILES['file']['name']; #because the file is in array, we must extract certain information from it
	$target_dir = "/xampp/htdocs/login_test/uploads/"; #this is the location we want the image to go to
	$target_file = $target_dir . basename($_FILES["file"]["name"]); #this will return the path of the image

	$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));	#image name is changed to make it easier for the code to read
	$extensions_arr = array("jpg", "jpeg", "png"); #must be one of the accpected formats


	if (empty($title) || empty($author) ||  empty($desc) || empty($class) || empty($email)) { #if the information is left empty
		header("Location: ../post.php?error=empty"); #gives error because it is missing information
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { #if only email was not in correct form
		header("Location: ../post.php?error=invalidemail"); #email must be in correct form or else it wont submit
		exit();
	}
	else {

		if(in_array($extension, $extensions_arr)) { #if image is in the correct format we can continue!
			move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$name); #moves the image to the folder in login_test
			$sql = "INSERT INTO posts (p_title, p_author, p_desc, p_class, p_email, p_image) VALUES (?,?,?,?,?,?)"; #information from the database will be accessed
			$statement = mysqli_stmt_init($connection); #connects to database
			if (!mysqli_stmt_prepare($statement, $sql)) { 
				header("Location: ../post.php?error&invalidinfo"); #this is if the database and data do not open 
				exit();
			}
			else{
				mysqli_stmt_bind_param($statement, "ssssss", $title, $author, $desc, $class, $email, $name); #data from the variables go to their respective positions in database
				mysqli_stmt_execute($statement); #cont.
				mysqli_stmt_store_result($statement); #cont.
				header("Location: ../home.php?book&saved"); #will send you back home with the message in header that the book was submitted
				exit();
			}
		}
	}
	mysqli_stmt_close($statement);
	mysqli_close($statement);
} else {
	header("Location: ../post.php");
}
?>