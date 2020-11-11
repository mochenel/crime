<?php
include_once"dbconnection.php";
require_once"phpmailer/PHPMailerAutoload.php";
require_once"phpmailer/class.PHPMailer.php";
if(isset($_POST["send"])){
	$to = $_POST["email"];
	$sql = "SELECT * FROM member WHERE email='$to'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
if($row=mysqli_fetch_assoc($result)){
$message ="your password is: ".$row["pwd"];
}

$s = "password retrieval";
$mail = new PHPMailer;
$mail->Host = "tls://smtp.gmail.com:587";
$mail->SMPTSecure = "tls";
//$mail->SMTPdebug=1;
$mail->Port = 587;
$mail->issmtp();
$mail->Username ="freddy9804@gmail.com";
$mail->Password = "";
$mail->SMPTAuth = true;
$mail->isHTML(true);
$mail->Subject=$s;
$mail->Body=$message;
$mail->setFrom("mochenefreddylebogo@gmail.com","freddy");
$mail->addAddress($to);
if($mail->send()){
	echo 'message sent';
}else{
	echo'error! '.$mail->ErrorInfo;
}
}else{
	echo"email is not registered";
}

}
/*
include_once"dbconnection.php";

if(isset($_POST["send"])){
$to = $_POST["email"];
$sql = "SELECT * FROM member WHERE email='$to'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
$subject = "password retrieval";
if($row=mysqli_fetch_assoc($result)){
$message ="your password is: ".$row["pwd"];
}
if (mail($to, $subject, $message,"FROM:chen@gmail.com")) {
   echo "SUCCESS";
} else {
   echo "ERROR";
}
}
else{
	echo "email is not registered";
}
}
*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		email
	</title>
</head>
<body>
	<form method="post">
		your email:<input type="email" name="email" required><br><br>
	
		<button type="submit" name="send"> send</button>
	</form>




</body>
</html>

