<form align='center' action="" method="post" >
    <h1>Select Book to Delete!</h1>
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
	<h3>Delete Book</h3>
    <input type="submit" value="delete">
</form>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=$_POST['id'];
		if (empty($id)){
			echo "Please Select Book";
		}else{
			$query="DELETE FROM `books` WHERE id=".$id;
			if (mysqli_query($con,$query)) {
				echo "Book Deleted!";
				header("Location: bookManagement.php");
			}else
				echo "Try again!";
			mysqli_close($con);
		}
	}
?>
