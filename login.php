<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Online Crime Reporting System Login</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
	</head>	

<body>
	
<div class="form-container"  >
		
	<img src="user.png" class="user-img">
	<h1>Login Here</h1>
	
	<form method="POST" action="loginaction.php">
		 <p>Username</p>
		 <input type="text" name="username" Placeholder="USERNAME" required>
		 <p>Password</p>
		 <input type="password" name="password" Placeholder="PASSWORD" required >
	     <button type="submit" name="submit"> log in</button>
	   <a href="main.php"><button type="button" name="cancel">cancel</button></a><br>
	   <a href="email.php">Forgot Password??</a>
		<a href="signup.php"><h3>Create account </h3></a>
		
	</form>

	 
	<?php
	/* if(isset($_POST["cancel"])){
		header("Location: main.php");
	}
	if(isset($_POST["submit"])){
		header("Location: loginaction.php");
	}*/

	if(isset($_GET["incorrectd"])){
	echo"<p> incorrect username or password </p>";
}

	?>

</div>

</body>
</html>