
<!DOCTYPE html>
<html>
<head>
	<title>feedback </title>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
</head>

<body>
	<div id="shell">
	<form method="POST" action="feedback.php">
		<h1> feedback </h1>
		<textarea style="box-shadow: 0 0 10px white;"  rows="10" cols="50" name="feedbackcontent" required=""></textarea ><br><br>
		<button type="submit" name="submit"> submit</button>
	<a href="reporter.php"><button type="submit" name="cancel">Cancel</button></a>
	</form>
</div>
	<?php
	include_once "dbconnection.php";
	session_start();
	$username=$_SESSION["username"];
	if (isset($_POST["submit"])) {
		$feedbackcontent=$_POST["feedbackcontent"];
		$time=date("y-m-d H:i:s");
		$insert = "INSERT INTO feedback(feedback_content,poster,feedback_time)
								VALUES('$feedbackcontent','$username','$time')";

								if(mysqli_query($conn, $insert)){
									echo"<p>feedback is sent to the adminstrator</p>";
								}else{
									echo "<p>feedback failed to be sent</p>";
								}
	
}

	?>

</body>
</html>