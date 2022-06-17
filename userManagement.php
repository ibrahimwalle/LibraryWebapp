<h1 align='center'>Users</h1>

<table border='1' width='50%' align='center' cellpadding=20>

<TR>
	<TH>ID</TH><TH>Username</TH><TH>Address</TH><th>Book ID</th><th>Title</th><th>Author</th>

</TR>
<?php
    require 'bootstrap.php';
    session_start();
    require 'connection.php';
    $query = "SELECT users.id,username,address,bookid,title,author FROM users,books WHERE users.bookid = books.id";
    $result = mysqli_query($con,$query);
    while( $row = mysqli_fetch_array($result) ) {
        echo "<tr align=center>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['bookid'] . "</td>";
		echo "<td>" . $row['title'] . "</td>";
		echo "<td>" . $row['author'] . "</td>";
        echo "</tr>";
    }
?> 
</table><br>
<div class="text-center">
    <a href="deleteUserAdmin.php">Delete a User</a><br>
    <a href="./adminHome.php">Go back to Home page!</a><br>
    <form> 
        Search Users: <input type="text" onkeyup="showHint(this.value)">
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
	xmlhttp.open("GET","getUserHint.php?query="+str,true);
	xmlhttp.send();
}
</script>