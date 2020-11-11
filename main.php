<?php
session_start();
session_unset();
session_destroy();

?>
<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online Crime Reporting System</title>
	<link rel="stylesheet" href="css/style.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<header>
		<div class="wrapper">
		 <div class="nav">
		 	<div class="logo">
			  Online Crime Reporting System
		     </div>
		    <div class="menu">
			 <ul>
			  <li><a href="login.php"> LOGIN </a></li>
			  <li><a href="signup.php"> SIGN UP </a></li>
		     </ul>
		   </div>
		 </div>	
		</div>
		
		<div class="welcome-text">
			<h1>WELCOME TO ONLINE CRIME REPORTING SYSTEM</h1>
			<p>Click below to view news</p>
			<a href="news.php"><button type="submit">READ NEWS</button></a>
		</div>
	</header>
</body>
</html>