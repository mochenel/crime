

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background:url('main2.png');">

<?php
// investigator chats action
include_once "dbconnection.php";
session_start();
echo '<link rel="stylesheet" type="text/css" href="css/chat_inv.css">';
echo"<div id='box'>";
$username = $_SESSION["username"]; // retain the username of investigator
echo"<a href='investigator.php'> Home</a><br><br>"; // investigator home page link
echo"<h1>". $username."</h1>"; // display the username of investigator
$q = "SELECT * FROM message WHERE sender='$username' OR receiver='$username'"; /*  query about the admin and ivestigator who is currently logged in */
$result = mysqli_query($conn,$q);
$num = mysqli_num_rows($result);
echo'<link rel="stylesheet" type="text/css" href="chat.css">';
if($num>0){
	while($row=mysqli_fetch_assoc($result)){
		$sender=$row["sender"];
		$receiver=$row["receiver"];
		$msg=$row["msg_description"];
		$time=$row["msg_time"];
		if($sender==$username){
			echo"<div id='sender'>";
			echo "<b>Me </b>:".$time."<br>";
			echo $msg."<br>";
			echo"</div>";
			
		}else{
			echo"<div id='receiver'>";
		echo"<b>". $sender."</b> :".$time."<br>";
			echo $msg."<br>";
			echo"</div>";
			
		}
		

	}
	echo"<form method='post'>";
	echo "<br><br><input type='text' id='field' name='message' required>
			  <button type='submit' name='sub'> send message </button>";
	echo "</form>";
	if(isset($_POST["sub"]) AND isset($_POST["message"])){ 
			$msg=$_POST["message"];
			$msg_time= date("y-m-d H:i:s");
			// $sender becomes the receiver as he/she is now receiving
			$q = "INSERT INTO message(msg_description,sender,receiver,msg_time)
				 			VALUES('$msg','$username','$sender','$msg_time')"; 
				 			mysqli_query($conn,$q);
				 			echo "message is sent";
				 			header("Location: chat.php");
		} 
}
echo"</div>";

?>
</body>
</html>
