<div class="text-center">
	<h1>Add a Book</h1>
	<form action="" method="post" accept-charset="utf-8">
		<p>Title: <input type="text" name="title">
		<p>Author: <input type="text" name="author">
		<p>Rental Fee: <input type="number" name="rentalfee">
		<input type="submit" value="Add">
	</form>
	<a href="./bookManagement.php">Show Books!</a><br>
	<a href="./adminHome.php">Go back to Home page!</a>
</div>
<?php
    require 'bootstrap.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$title=$_POST['title'];
    $author=$_POST['author'];
    $rentalfee=$_POST['rentalfee'];
	if (empty($title)||empty($author)||empty($rentalfee)){
		echo "Please include all infomation";
	}else{
		require "connection.php";

		$query="INSERT INTO `books`(`id`, `title`, `author`, `rentalfee`) VALUES (NULL,'$title','$author','rentalfee')";

		if ( mysqli_query($con,$query) ) //run the query
			echo "the Book $title is successfuly added";
		else
			echo "Try again!";
		mysqli_close($con);
	}
}
?>