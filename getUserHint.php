<?php
    $query=$_GET["query"];
    
    require 'connection.php';
    $result = mysqli_query($con, "select username, address from users where username like'%$query%' or address like'%$query%'");
    while($row = mysqli_fetch_array($result) ) {
        echo $row['username'].", Address: ".$row['address']."<br>";
    } 
    mysqli_close($con);
    
?>