<?php
session_start();
include 'inside/database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | ChoateBooks</title> <!-- the header name -->
	<link rel="stylesheet" type="text/css" href="design/home.css"> <!-- links to the css file -->
</head>
<body>
	<h1>ChoateBooks</h1>
	<div id="navigation">
		<form id="search" action="search.php" method="POST"> <!-- creates form for user to input information into the search.php file -->
			<input type="text" name="search" placeholder="search for book/class"> <!-- enter in item that they want to find -->
			<button type="submit" name="submit-search">Search!</button> <!-- information will go into search.php and bring you to the page -->
		</form>
		<form id="button" action="post.php" method="post">
			<button type="submit" name="post">Create a Post</button> <!-- will lead to post.php page -->
		</form>
		<form id="button" action="inside/logout.info.php" method="post"> 
			<button type="submit" name="logout-submit">Sign Out</button> <!-- button will lead back to login page -->
		</form>
	</div>

	<h2 id="book">Book Posts</h2> 
	<div>
		<?php
			$sql = "SELECT * FROM posts"; #will get all the data in posts database
			$result = mysqli_query($connection, $sql); #connects to the database to get the data
			$queryResults = mysqli_num_rows($result); #gets the data from the data
			if ($queryResults > 0) {
				while ($row = mysqli_fetch_assoc($result)) { #outputs each of the posts from the first id to the last
					echo "<div class='post'> 
						<h2>".$row['p_title']."</h2>
						<h3> Author: ".$row['p_author']."</h3>
						<p><b>Description:</b><br>".$row['p_desc']."</p>
						<img id='pic' src=uploads/".$row['p_image'].">
						<h5>Class: ".$row['p_class']." | Post by: ".$row["p_email"]."</h5>
					</div>"; #this outputs the data from the database <posts> into a format that can be understood by the audience
				}
			}
			else {
				echo "<div class='post'>  
				<h2>There are no books right now. Please come again later.</h2>
				</div>"; #if there is no books it will return this message
			}
		?>
	</div>
</body>
</html>