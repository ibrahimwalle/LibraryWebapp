<div class="text-center">
	<form action="" method="post" >
		<h1>Select Users to Delete!</h1>
		<select name="id" id="select">
			<?php 
				require 'connection.php';
				$query = "SELECT id,username FROM users";
				$result = mysqli_query($con,$query);
				while( $row = mysqli_fetch_array($result) ) {
					echo "<option value=".$row['id'].">".$row['id']." ".$row['username']."</option>";
				}			
			?>
		</select>
		<h3>Delete User</h3>
		<input type="submit" value="delete">
	</form>
	<a href="./userManagement.php">Show Users!</a><br>
	<a href="./adminHome.php">Go back to Home page!</a>
</div>
<?php
    require 'bootstrap.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=$_POST['id'];
		if (empty($id)){
			echo "Please Select User";
		}else{
			$query="DELETE FROM `users` WHERE id=".$id;
			if (mysqli_query($con,$query)) {
				echo "User Deleted!";
				header("Location: userManagement.php");
			}else
				echo "Try again!";
			mysqli_close($con);
		}
	}
?>
