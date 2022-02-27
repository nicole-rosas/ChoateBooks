<?php
session_start();
//sign up page
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up | ChoateBooks</title> <!-- header text -->
	<link rel="stylesheet" type="text/css" href="design/signup.css"> <!-- links to the style sheet(signup.css) -->
</head>
<body>
	<main>
		<div>
			<section>
				<h1 id="name">ChoateBooks</h1> <!-- our logo -->
				<h3>Who Are We?</h3>
				<div id="text"> <!-- paragraph introducing choatebooks to new users -->
					<p>We are <b>Choatebooks</b>! We help <b>Choate Rosemary Hall</b> students find a better place for their textbooks! Are you tired of not being able to return your textbooks from the book store? Are you tired of having to carry your textbooks back home to sit and collect dust because you refuse to toss a perfectly fine $80+ textbook away? Then look no further! Sign up at <b>Choatebooks</b> and create posts of textbooks you want to sell or trade! Or if you are in need of a textbook but don't want to pay the whole price, create an account and you can find the exact textbook at a lower cost(negotiations are possible)!</p>
				</div>
				<h3>Sign Up</h3>
				<form action="inside/signup.info.php" method="post"> <!-- where users put their information -->
					<div>
						<label for="username">Username</label> 
						<br />
						<input type="type" name="username" placeholder="username" /> <!-- where they type in username -->
					</div>
					<div>
						<label for="email">Email</label>
						<br />
						<input type="type" name="email" placeholder="email" /> <!-- user puts in their email (must be choate.edu) -->
					</div>
					<div>
						<label for="password">Password</label>
						<br />
						<input type="password" name="password" placeholder="password" /> <!-- enter in password -->
					</div>
					<button type="submit" name="signup-submit">Sign up done!</button> <!-- will be sent to signup.info.php to get added to the database -->
				</form>
			</section>
		</div>
	</main>
</body>
</html>
