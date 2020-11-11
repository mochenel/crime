<?php
session_start();
include_once "dbconnection.php";
if(isset($_POST["cancel"])){
	header("Location: main.php");
}
$check=isset($_POST["submit"]);
if($check){
	$username = $_POST["username"];
	$pwd = $_POST["password"];
	$query = "SELECT * FROM member WHERE username='$username';";
	$result = mysqli_query($conn,$query);
	$num = mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result); 

	if(password_verify($pwd,$row['pwd'])){
		// correct details

			$station_tel_number=$row["station_tel_number"];
			$_SESSION["username"]=$row["username"];
			//echo $_SESSION["username"];
			if($station_tel_number==0){
				header("Location: reporter.php?login=success");
			}
			else if($station_tel_number==1){
				header("Location: admin.php?login=success");
			}else{
				header("Location: investigator.php?login=success");
			}
		
	}else{
		//incorrect details
		header("Location: login.php?incorrectd");
	}

}

?>