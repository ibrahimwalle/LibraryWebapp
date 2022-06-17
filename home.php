<div class="text-center">
    <?php 
        require 'bootstrap.php';
        session_start();
        $username=$_SESSION['username'];
        echo "<h1>Welcome ".$username."</h1>";

    ?>
    <h3>
    <br><a href="books.php">Browse Books</a><br>
    <a href="userDetails.php">User Details</a><br>
    <a href="donateBook.php">Donate Book</a><br>
    <a href="logout.php">Log Out</a>
    </h3>
</div>