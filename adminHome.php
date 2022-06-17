<div class="text-center">
<?php 
    require 'bootstrap.php';
    session_start();
    $adminUsername=$_SESSION['adminUsername'];
    echo "<h1>Welcome ".$adminUsername."</h1>";

?>
<h3>
<br><a href="bookManagement.php">Manage Books</a><br>
<a href="userManagement.php">Manage Users</a><br>
<a href="logout.php">Log Out</a>
</h3>
</div>