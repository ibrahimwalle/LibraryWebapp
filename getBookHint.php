<?php
    $query=$_GET["query"];
    
    require 'connection.php';
    $result = mysqli_query($con, "select title, author from books where title like'%$query%' or author like'%$query%'");
    while($row = mysqli_fetch_array($result) ) {
        echo $row['title']." by ".$row['author']."<br>";
    } 
    mysqli_close($con);
    
?>