<?php
    require 'bootstrap.php';
    session_start();
    require 'connection.php';
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error="Username or Password empty";
	}else{
		$username=$_POST['username'];
		$password=$_POST['password'];			
		
		$q="select id from admins where username='".$username."' 
		AND password='".$password."'";
		$result=mysqli_query($con,$q);
		$rows=mysqli_num_rows($result);
		if ($rows == 1) { //the sign in is succefull, matching is correct
			echo "Login Successfull!";
            $userDetails = mysqli_fetch_array($result);
            $_SESSION['adminid'] = $userDetails['id'];
            $_SESSION['adminUsername'] = $username;				
			header("location: adminHome.php"); // Redirecting To Other Page
			
		} else {//matching is not correct
			$error = "Username or Password is invalid";
		}
		mysqli_close($con); // Closing Connection
	}
}

?>

<html>
<head>
<title>Admin Login</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body class="text-center">
    <div id="main">
        <h1>Admin Login </h1>
        <div id="login">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label>Enter your username :</label>
                <input id="name" name="username" placeholder="Enter Username" type="text"><br>
                <label>Enter your password :</label>
                <input id="password" name="password" placeholder="**********" type="password"><br>
                <input name="submit" type="submit" value=" Login ">
                <span><?php echo $error; ?></span>
            </form>
        </div>
    </div>
    <A Href="login.php"> User Login</A>
</body>
</html>

