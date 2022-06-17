<?php
    session_start();
    $userid = $_SESSION['userid'];
    require "connection.php";
    $query="UPDATE users set bookid = 5 where id=".$userid;

    if (mysqli_query($con,$query)){
        echo "Book Returned!";
        header("Location: userDetails.php");
    }else
        echo "Try again!";
    mysqli_close($con);
?>