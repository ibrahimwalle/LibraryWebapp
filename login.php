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
		
		$q="select id from users where username='".$username."' 
		AND password='".$password."'";
		$result=mysqli_query($con,$q);
		$rows=mysqli_num_rows($result);
		if ($rows == 1) { //the sign in is succefull, matching is correct
			echo "Login Successfull!";
            $userDetails = mysqli_fetch_array($result);
            $_SESSION['userid'] = $userDetails['id'];
            $_SESSION['username'] = $username;			
			header("location: home.php"); // Redirecting To Other Page
			
		} else {//matching is not correct
			$error = "Username or Password is invalid";
		}
		mysqli_close($con); // Closing Connection
	}
}

?>

<html>
<head>
<title>User Login</title>
</head>
<body class="text-center">
    <div id="main">
        <h1>Login or signUp to Continue!</h1>
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
    <A Href="signup.php"> Sign up </A> <br>
    <A Href="adminLogin.php"> Admin Login</A>
</body>
</html>

