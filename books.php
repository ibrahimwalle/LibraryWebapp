<h1 align='center'>Books</h1>

<!-- SHOW BOOKS -->

<table class="my-3" border='1' width='50%' align='center' cellpadding=20>

<TR>
	<TH>ID</TH><TH>Title</TH><TH>Author</TH><th>Rental Fee</th>

</TR>
<?php
    require 'bootstrap.php';
	session_start();
	require 'connection.php';
	$query = "SELECT * FROM books WHERE id != 5";
	$result = mysqli_query($con,$query);
	while( $row = mysqli_fetch_array($result) ) {
		echo "<tr align=center>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['title'] . "</td>";
		echo "<td>" . $row['author'] . "</td>";
		echo "<td>" . $row['rentalfee'] . "</td>";
		echo "</tr>";
	}
?> 
</table>


<!-- Rent -->
<div class="text-center">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
		<h1>Select Book to Rent!</h1>
		<select name="id" id="select">
			<?php 
				$query = "SELECT id,title FROM books WHERE id != 5";
				$result = mysqli_query($con,$query);
				while( $row = mysqli_fetch_array($result) ) {
					echo "<option value=".$row['id'].">".$row['id']." ".$row['title']."</option>";
				}			
			?>
		</select>
		<input type="submit" value="Rent!" name="rent" >
	</form>
	<a href="./donateBook.php">Donate a new Book!</a><br/>
	<a href="./home.php">Go back to Home page!</a>
</div>
<?php
if(ISSET($_POST['rent'])){
		
		$id=$_POST['id'];
		$userid = $_SESSION['userid'];
		if(empty($id)){
			echo "Please Select a Book!";
		}else{
			
			$query="UPDATE `users` SET `bookid`=".$id ." WHERE id=".$userid;
			$res= mysqli_query($con,$query) ;
					
			$r= mysqli_affected_rows($con);
			 
			if ($r==1) {
				echo "Rental Complete!";
				
			}else{
				echo "You already have this book rented!";
			}
			mysqli_close($con);
		}

}
?>