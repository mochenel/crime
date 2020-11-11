<!DOCTYPE html>
<html>
<head>
	<title>
		email
	</title>
	<link rel="stylesheet" type="text/css" href="css/email.css">
</head>
<body>
	<div class="form-container" >
	<form method="post">
		your email:<input type="email" name="email" required><br><br>
	
		<button type="submit" name="send"> send</button>
	</form>
	</div>


<?php
session_start();
include_once"dbconnection.php";

if(isset($_POST["send"])){
$to = $_POST["email"];
$_SESSION["email"] = $to;
$sql = "SELECT * FROM member WHERE email='$to'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
$subject = "password retrieval";
if($row=mysqli_fetch_assoc($result)){
$message ="<a href='http://localhost/cosc300/update.php'>Click here to reset your password </a>";
}
if (mail($to, $subject, $message,"FROM:chen@gmail.com")) {
   echo "password is to ".$to;
} else {
   echo "ERROR";
}
}
else{
	echo "email is not registered";
}
}

?>
</body>
</html>

