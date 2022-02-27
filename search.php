<?php
session_start();
include 'inside/database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>search</title>
	<link rel="stylesheet" type="text/css" href="design/home.css"> <!-- links to the css file -->
	<style>
		a {text-decoration: none;}
	</style>
</head>
<body>
	<h1>ChoateBooks</h1>
	<div id="navigation">
		<form id="search" action="search.php" method="POST"> <!-- creates form for user to input information into the search.php file -->
			<input type="text" name="search" placeholder="search for book/class/teacher/etc."> <!-- enter in item that they want to find -->
			<button type="submit" name="submit-search">Search!</button> <!-- information will go into search.php and bring you to the page -->
		</form>
		<form id="button" action="post.php" method="post">
			<button type="submit" name="post">Create a Post</button> <!-- will lead to post.php page -->
		</form>
		<form id="button" action="inside/logout.info.php" method="post"> 
			<button type="submit" name="logout-submit">Sign Out</button> <!-- button will lead back to login page -->
		</form>
		<form>
			<a href="home.php">Home</a>
		</form>
	</div>
	<h1 id="book">Search page</h1>
	<div>
		<?php
		if (isset($_POST['submit-search'])) { #if the button to search is pressed
			$search = mysqli_real_escape_string($connection, $_POST['search']); #takes the data that was submitted from home.php
			$sql = "SELECT * FROM posts WHERE p_title LIKE '%$search%' OR p_author LIKE '%$search%' OR p_desc LIKE '%$search%' OR p_class LIKE '%$search%'"; #goes through every section to find what the user is looking for
			$result = mysqli_query($connection, $sql); #connects to database and data
			$queryResult = mysqli_num_rows($result); #finds the results that the user wants
			if ($queryResult > 0) { #if more than 0 results are found it will be show up here
				while ($row = mysqli_fetch_assoc($result)){
					echo "<div class='post'> 
						<h2>".$row['p_title']."</h2>
						<h3>author: ".$row['p_author']."</h3>
						<p> description: <br>".$row['p_desc']."</p>
						<h5>class: ".$row['p_class']." | post by: ".$row["p_email"]."</h5>
						<img id='pic' src=uploads/".$row['p_image'].">
					</div>"; #this outputs the data from the database <posts> into a format that can be understood by the audience
				}
			} else {
				echo "<div class='post'> 
				<h2>There are no results. Please come again later.</h2>
				</div>"; #if no results will give you message
			}
		}
		?>
	</div>
</body>
</html>