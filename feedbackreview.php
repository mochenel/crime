<?php
include_once "dbconnection.php";
$select = "SELECT * FROM feedback ";
$result = mysqli_query($conn,$select);
$num = mysqli_num_rows($result);
if($num>0){
	// feedback table is not empty
	echo "<hr>";
	while ($row=mysqli_fetch_assoc($result)) {
		$feedback_content = $row["feedback_content"];
		$poster = $row["poster"];
		$feedback_time = $row["feedback_time"];
		echo "<b>posted by ".$poster." : ".$feedback_time."</b><br><br>";
		echo $feedback_content."<hr>";

	}
}else{
	// feedback table is empty
	echo "<h5>there are no feedbacks yet </h5>";
}