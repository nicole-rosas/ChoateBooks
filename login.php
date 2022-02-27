<!DOCTYPE html>
<html>
<head>
	<title>ChoateBooks</title> <!-- will show up in the tabs -->
	<link rel="stylesheet" type="text/css" href="design/login.css"> <!-- links to the css sheet -->
	<style>
		a {text-decoration: none;}
	</style>
</head>
<body>
	<h1 id="name">ChoateBooks</h1> <!-- name of my website will show up on top -->
	<h3 id="slogan">Helping students get textbooks since 2020!</h3> <!-- my slogan of sorts -->
	<div>
	<main>

		<div>
		<form id= "form" action="inside/login.info.php" method="post"> <!-- form so that user can input their login -->
			<input type="text" name="email" placeholder="username or email"> <!-- type in their email or their username -->
			<input type="password" name="pass" placeholder="password"> <!-- put in their password -->
			<button type="submit" name="login-submit">Login!</button> <!-- by pushing the button the information is sent to the php file where it will take the data and check with the database to see if it is correct if not it will send message -->
		</form>
		<a href="signup.php">New? Sign up here!</a> <!-- will send user to make an account -->
		</div>

	</main>
	</div>
</body>
</html>