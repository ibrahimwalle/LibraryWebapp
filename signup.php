<?php
    require 'bootstrap.php';
    require 'connection.php';
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['address'])) {
		$error="Please Fill out all details";
	}else{
		$username=$_POST['username'];
		$password=$_POST['password'];
        $address=$_POST['address'];			
		
		$q="INSERT INTO users (username, password, address) VALUES('$username','$password','$address')";
		if($result=mysqli_query($con,$q)){
            echo "User Added";
        }else{
            echo "Username already Exists";
        }
		mysqli_close($con); // Closing Connection
	}
    }

?>

<html>
<head>
<title>Library SignUp</title>
</head>
<body class="text-center">
    <div id="main">
        <h1>User SignUp</h1>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label>Enter your username :</label>
                <input id="name" name="username" placeholder="Enter Username" type="text"><br>
                <label>Enter your password :</label>
                <input id="password" name="password" placeholder="**********" type="password"><br>
                <label>Enter your address :</label>
                <input id="address" name="address" placeholder="Enter Address" type="text"><br>
                <input name="submit" type="submit" value=" SignUp ">
                <span><?php echo $error; ?></span>
            </form>
        </div>
    </div>

    <A Href="login.php">Login Page</A>
</body>
</html>

