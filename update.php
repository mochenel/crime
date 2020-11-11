
<!DOCTYPE html>
<html>
<head>
	<title>
		update password
	</title>
</head>
<body>
<form method="post">
	USERNAME<br><input type="text" name="username" required><br>
	PASSWORD<br>
	<input type="text" name="pwd" required><br>
	CONFIRM PASSWORD<br>
	<input type="text" name="cpwd" required>
	<br>
	<button type="submit" name="submit">CHANGE</button>
</form>
<?php
session_start();
$email = $_SESSION["email"];
include_once"dbconnection.php";
if(isset($_POST["submit"])){

	$username = $_POST["username"];
	$pwd=$_POST["pwd"];
	$cpwd=$_POST["cpwd"];
	if($pwd==$cpwd){
		$sql = "SELECT * FROM member WHERE username='$username' AND email='$email'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$hash = password_hash($pwd, PASSWORD_DEFAULT);
			$sql="UPDATE member SET pwd='$hash' WHERE username='$username'";
			if(mysqli_query($conn,$sql)){
				echo "<p> password is changed </p>";
			}
		}else{
			echo"<p>enter valid username</p>";
		}
	}else{
		echo"<p> passwords do not match</p>";
	}
}
?>
</body>
</html>