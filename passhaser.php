<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
	<input type="text" name="user"><br>
	<input type="password" name="pwd" required="">
	<button type="submit" name="submit">submit</button>
</form>

<?php
include_once "dbconnection.php";
if(isset($_POST["submit"])){
	$user=$_POST["user"];
	$pw = $_POST["pwd"];
	$sql = "SELECT * FROM member WHERE username='$user'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		if($row=mysqli_fetch_assoc($result)){
			$pwd = $row["pwd"];
			$hash=password_hash($pwd,PASSWORD_DEFAULT);
	$sql = "UPDATE member SET pwd='$hash' WHERE username='$user'";
			if(mysqli_query($conn,$sql)){
				echo "goooooooood";
			}
		}
	}else{
		echo "username does not exist";
	}
}

?>
</body>
</html>