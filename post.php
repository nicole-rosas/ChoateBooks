<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Make Post | ChoateBooks</title>
	<link rel="stylesheet" type="text/css" href="design/post.css"> <!-- links to the css file -->
	<style>
		a {text-decoration: none;} /* so taht the link doesn't have the line underneath*/
	</style>
</head>
<body>
<main>
	<h1>ChoateBooks</h1> <!-- logo of the site -->
	<h2>Make your Book Post</h2> <!-- mini header for making a post -->
	<div>
		<form action="inside/post.info.php" method="post" enctype="multipart/form-data"> <!-- the user will have to add in all this information -->
			<div>
				<label for="title">Title of Book</label> <!-- labels the input box so that the user knows to add the title here -->
				<br />
				<input id="text" type="text" name="title" placeholder="name of book"/> <!-- user puts in name of book / i think the other inputs and labels is explanatory so I wont say more -->
			</div>
			<div>
				<label for="author">Author's Name</label>
				<br />
				<input id="text" type="text" name="author" placeholder="name of author"/>
			</div>
			<div>
				<label for="description">Description of book</label>
				<br />
				<textarea name="description" rows="6" cols="80" placeholder="description of book, condition, what class & teacher"></textarea> <!-- this is a textarea so that it can be a bigger textbox -->
			</div>
			<div>
				<label for="class">Class Name</label>
				<br />
				<input id="text" type="text" name="class" placeholder="name of class"/>
			</div>
			<div>
				<label for="email">Email to Contact</label>
				<br />
				<input id="text" type="text" name="email" placeholder="email so that they contact you"/>
			</div>
			<div>
				<label for="file">Image of Book</label>
				<br />
				<input type='file' name='file'/>
			</div>
			<div>
				<button type="submit" name="post-submit">submit the post!</button> <!-- the data the user inserted goes to post.info.php to be put into database if the information is accepted -->
				<a href="home.php">Go Back</a>  <!-- This link brings you back home if you pressed the button by accident -->
			</div>
		</form>
	</div>
</main>
</body>
</html>