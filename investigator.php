<?php
include_once "dbconnection.php";
session_start();
if(isset($_SESSION["username"])){
	$username=$_SESSION["username"];
}
else{
	header("Location: main.php");
}

?>

<!doctype html>
<html>
<head>
<title>
investigator's home page
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style type="text/css">
	.welcome-text{
		margin-top: 100px;
	}

	#sidebar{
		height: 30vh;
		z-index: 200;
	}
</style>

</head>
<body>

<div class="wrapper">
	<div class="nav">
		<p><i class="fa fa-bars" id="nav_menu"></i></p>
		<p><h1 id="report" > INVESTIGATORS'S HOME PAGE  </h1></p>
	</div>
	<div class="nav_bar">
		
			

			<div id="sidebar">
					<!--<i class="fa fa-close close"></i>-->
					<ul>
						<li> <a href="main.php" style="color: red"> LogOut </a> </li>
						<li> <a href="news.php" > view news </a> </li>
						<li> <a href="chat.php" > chat with admin </a> </li>
						<li> <a href="criminal.php" > record criminal details </a> </li>
					</ul>

			</div>
		
	</div>

<div class="welcome-text">
			<h1>Click below to view notifications</h1>
			<form method="post" action="notification.php">
	<button type="submit" name="notification">notification</button>
</form>
</div>

</div>

</div>


</div>

<script type="text/javascript">
	var arr = [0,1];
	$("#nav_menu").on('click', function(){
		

		if (arr[0] == 0) {
			$("#sidebar").show(1000);
			arr[0] = 1;
		}else{
			if (arr[0] == 1) {
			$("#sidebar").hide(1000);
			arr[0] = 0;
			}
		}

		
		
	});
</script>
</body>
</html>