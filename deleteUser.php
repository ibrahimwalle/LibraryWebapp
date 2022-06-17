<?php
    session_start();
    $userid = $_SESSION['userid'];
    require "connection.php";
    $query="DELETE FROM `users` WHERE id=".$userid;

    if (mysqli_query($con,$query)){
        echo "User Deleted!";
        header("Location: logout.php");
    }else
        echo "Try again!";
    mysqli_close($con);
?>