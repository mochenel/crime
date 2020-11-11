<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
	
	//echo $username;
}

?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/crime.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>
		report crime 
	</title>
	<style type="text/css">
		#form{
			display: none;
		}

		#loader{
			text-align: center;
			color: black;
			background:white;
			font-size: 20px;
			box-shadow: 0 0 10px black;
			padding: 10px;
			border-radius: 10px;
		}

		input, textarea{
			box-shadow: 0 0 10px white;
		}
	</style>
</head>
<body>
	<h1> FILL IN THE DETAILS BELOW TO REPORT CRIME </h1>
	<br>
	<ul>
	</ul>
	<hr>
	<div id="step1">
	<div class="shell">
		<p id="loader">please allow location to continue..<i class="fa fa-spinner fa-spin"></i></p>
	<form method="post" id="form" action="step2.php" enctype="multipart/form-data">
		<label> Crime Type</label>
		<input type="text" name="crime_type" required>
		<label> Crime Description</label>
		<textarea name="crime_description" rows="5" cols="20" required></textarea><br>
		<label> Location of Crime</label>
		<input type="text" name="crime_location" required>
		<label id="append_coords"> Date of Crime</label><br>
		<p id="append_coords"> </p>
		
		<input type="date" name="crime_date" required><br>
		<h5>EVIDENCE</h5>
		<input type="file" name="file[]"  multiple><br><br>
		<button type="submit" name="submit">Submit</button>
		<a href="reporter.php"><button type="button">Cancel</button></a>
	</form>
</div>
</div>



<script type="text/javascript">
	


function myMap(){

navigator.geolocation.getCurrentPosition(function(position){

     var options = {
     zoom : 15,
     center: {lat: position.coords.latitude, lng:position.coords.longitude}
        };
       console.log(position.coords.latitude);
       $("#append_coords").append('<input type="hidden" name="latitude" value="'+position.coords.latitude+'" ><input type="hidden" value="'+position.coords.longitude+'" name="longitude">');
       $("#form").show(500);
       $("#loader").hide();

    var map = new google.maps.Map(document.getElementById('map'), options);

    var pointer = new google.maps.Marker({
        position:{lat: position.coords.latitude, lng:position.coords.longitude},
        map:map
    });

});


}

myMap();



</script>
</body>
</html>