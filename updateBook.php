<div class="text-center">
	<form action="" method="post" >
		<h1>Select Book to Update!</h1>
		<select name="id" id="select">
			<?php 
				require 'connection.php';
				$query = "SELECT id,title FROM books WHERE id != 5";
				$result = mysqli_query($con,$query);
				while( $row = mysqli_fetch_array($result) ) {
					echo "<option value=".$row['id'].">".$row['id']." ".$row['title']."</option>";
				}			
			?>
		</select>
		<h3>Update Rental Fee</h3>
		<p>Rental Fee: <input type="number" name="fee">
		<input type="submit" value="Update">
	</form>
	<a href="./bookManagement.php">Show Books!</a><br>
	<a href="./adminHome.php">Go back to Home page!</a>
</div>
<?php
    require 'bootstrap.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=$_POST['id'];
		$fee=$_POST['fee'];
		if (empty($fee)||empty($id)){
			echo "Please include all infomation";
		}else{
			$query="UPDATE books set rentalfee = '$fee' where id=".$id;
			if (mysqli_query($con,$query)) {
				echo "Rental Fee Updated!";
				header("Location: bookManagement.php");
			}else
				echo "Try again!";
			mysqli_close($con);
		}
	}
?>
