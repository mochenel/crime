<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include_once "dbconnection.php";
session_start();
echo '<link rel="stylesheet" type="text/css" href="css/chat.css">';
echo"<div id='box'>";
echo"<a href='admin.php'> Home</a><br><br>";
$username = $_SESSION["username"]; // admin username
echo "<form method='post' action=''>";
echo"<input type='search' name='search'><button type='submit' name='submit'> find receiver </button>";
echo "</form>";
if(isset($_GET["sent"])){ //????????

			
				 			echo"message is sent <hr>";
			 		
		}
// this checks whether the entered username exists in member table as investigator
if(isset($_POST["submit"])){
	$search=$_POST["search"];
	$_SESSION["search"] = $search;
	$q = "SELECT * FROM member WHERE police_station <>'' AND username='$search';"; /* if police station is not empty and username exists then bring the results */
	$result=mysqli_query($conn,$q);
	$num=mysqli_num_rows($result);
	if($num>0){
		// if the username exists then check in the message to retrieve all messages associated with admin
		$q = "SELECT * FROM message WHERE (sender='$username' or receiver='$search') OR (receiver='$username' or receiver='$search');";
		$result=mysqli_query($conn,$q);
		$num=mysqli_num_rows($result);
		if($num>0){
		while($row=mysqli_fetch_assoc($result)){
			$sender=$row["sender"]; // get sender which is admin
			$msg_description=$row["msg_description"]; // get message
			$receiver=$row["receiver"]; // get receiver which is investigator
			$msg_time=$row["msg_time"]; // get message sent time
			if($sender==$username AND ($receiver==$search OR $sender==$search)){
				echo"<div id='sender'>";
				echo "me : ".$msg_time."<br>"; 
			echo $msg_description."<br>";
			echo"</div>"; // display horizontal line
			} if( $sender===$search){
				echo"<div id='receiver'>";
				echo $sender." : ".$msg_time."<br>"; 
			echo $msg_description."<br>";
			echo"</div>"; // display horizontal line
			}

		}
	
	}	echo "<form method='POST' action='tester.php'>";
		echo "<br><br><input type='text' id='field' name='message' required title='you cannot send empty message'>  
			  <button type='submit' name='sub'> Send  </button>";
		echo"</form>";

	}else{
		echo "<p> username does not exist </p>";
	}
	
echo"</div>";


}
?>
</body>
</html>
