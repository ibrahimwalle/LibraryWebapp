<h1 align='center'>Books</h1>

<!-- SHOW BOOKS -->

<table border='1' width='50%' align='center' cellpadding=20>

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
</table><br>
<div class="text-center">
    <a href="addBook.php">Add a Book</a><br>
    <a href="updateBook.php">Update a Book</a><br>
    <a href="deleteBook.php">Delete a Book</a><br>
    <a href="./adminHome.php">Go back to Home page!</a><br>
    <form> 
        Search Book: <input type="text" onkeyup="showHint(this.value)">
        <p>Suggestions: <div id="hint">
    </form>
</div>
<script>
function showHint(str){
	if (str.length==0)	{ 
		document.getElementById("hint").innerHTML="";
		return;
	}
	xmlhttp=new XMLHttpRequest();	
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)   {
			document.getElementById("hint").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","getBookHint.php?query="+str,true);
	xmlhttp.send();
}
</script>