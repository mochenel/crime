<?php
include_once "dbconnection.php";
session_start();

$search=$_SESSION["search"]; // receiver of the message 
$username = $_SESSION["username"]; // sender of the message

		if(isset($_POST["sub"])){ 
			$msg=$_POST["message"]; // get the messgae written by sender
			$msg_time= date("y-m-d H:i:s"); // get current system times
			$q = "INSERT INTO message(msg_description,sender,receiver,msg_time)
				 			VALUES('$msg','$username','$search','$msg_time')"; 
				 			mysqli_query($conn,$q);
				 			header("Location: adminchats.php?sent");
		} 