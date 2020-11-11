<!DOCTYPE html>
<html>
<head>
<title>
main page(online reporting system)
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/reporters.css">

<style type="text/css">
	#sidebar{
		display: none;
	}
</style>


</head>
<body>

<!-- nav bar -->
<div class="wrapper">
  <div class="nav" >
  <p><i class="fa fa-bars" id="nav_menu"></i></p>
  <p><h1 id="report"> REPORTER'S HOME PAGE  </h1></p>
  
</div>


<!-- nav bar -->
<div class="container">
<div id="header">
    <?php

	session_start();
	    if(!isset($_SESSION["username"])){
	    	header("Location: main.php");
	    }
	$username = $_SESSION["username"];
	echo "<h1>".$username."</h1>";

?>
</div>
<div id="sidebar">
<ul>
<li> <a href="main.php" style="color: red"> LogOut </a> </li>
<li> <a href="crime.php" > Report Crime </a> </li>
<li> <a href="crimestatus.php" > View Crime Status </a> </li>
<li> <a href="feedback.php" > Give Feedback </a> </li>
</ul>
</div>
 </div>
</div>

<div class="welcome-text">
			<h1>Click below to view News</h1>
			<a href="news.php"><button type="submit">READ NEWS</button></a>
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