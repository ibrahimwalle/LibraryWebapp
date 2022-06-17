<div class="text-center">
	<h1>Donate Book</h1>
	<form action="" method="post" accept-charset="utf-8">
		<p>Title: <input type="text" name="title">
		<p>Author: <input type="text" name="author">
		<input type="submit" value="Add">
	</form>
	<a href="./books.php">Show Books!</a><br>
	<a href="./home.php">Go back to Home page!</a>
</div>	
<?php
    require 'bootstrap.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$title=$_POST['title'];
		$author=$_POST['author'];
		if (empty($title)||empty($author)){
			echo "Please include all infomation";
		}else{
			require "connection.php";

			$query="INSERT INTO `books`(`id`, `title`, `author`) VALUES (NULL,'$title','$author')";

			if ( mysqli_query($con,$query) ) //run the query
				echo "the Book $title is successfuly added";
			else
				echo "Try again!";
			mysqli_close($con);
		}
	}
?>