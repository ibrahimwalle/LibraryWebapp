<h1 align='center'>User Details</h1>

<table class="my-3" border='1' width='50%' align='center' cellpadding=20>

<TR>
	<TH>ID</TH><TH>UserName</TH><TH>Address</TH><th>Title</th><th>Author</th>

</TR>
<?php
    require 'bootstrap.php';
	session_start();
	$userid=$_SESSION['userid'];
	require 'connection.php';
	$query = "SELECT users.id,username,address,bookid,title,author FROM users,books WHERE users.bookid = books.id AND users.id=".$userid;
	$result = mysqli_query($con,$query);
	while( $row = mysqli_fetch_array($result) ) {
		echo "<tr align=center>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['address'] . "</td>";
		echo "<td>" . $row['title'] . "</td>";
		echo "<td>" . $row['author'] . "</td>";
		echo "</tr>";
	}
?> 
</table>
<div class="text-center">
	<form action="" method="post" accept-charset="utf-8">
		<h3>Update Address</h3>
		<p>Address: <input type="text" name="address">
		<input type="submit" value="Update">
	</form>
	<a href="returnBook.php">Return Book!</a><br>
	<a href="deleteUser.php">Delete User</a><br>
	<a href="home.php">Go back to Home page</a>
</div>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$address=$_POST['address'];
		if (empty($address)){
			echo "Please include all infomation";
		}else{
			require "connection.php";

			$query="UPDATE users set address = '$address' where id=".$userid;

			if (mysqli_query($con,$query)) {
				echo "Address Updated!";
				header("Location: userDetails.php");
			}else
				echo "Try again!";
			mysqli_close($con);
		}
	}
?>
