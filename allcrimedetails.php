<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCs-aQ-qOBYXV8GvGYbFFl534NcHhtHNFo"></script>
	<style type="text/css">
		.location{
			background:green;
			color: white;
			cursor: pointer;
		}

		.location:hover{
			background:linear-gradient(lime,green);
		}


		#my_map{
			width: 100%;
			height: 100vh;
			background:black;
			opacity: 0.95;
			position: absolute;
			top: 0;
			left: 0;
			z-index: 100;
			display: none;
		}

		#close{
			padding: 5px;
			color: red;
			border-radius: 20px;
			box-shadow: 0 0 10px white;
			position: absolute;
			top: 20px;
			right: 20px;
			cursor: pointer;
		}

		#close:hover{
			color: white;

		}
		#map{
			width: 50%;
			margin:0 auto;
			margin-top: 30px;
			height: 500px;
			box-shadow: 0 0 20px blue;

		}
	</style>
</head>
<body>

<div id="my_map">
	<i class="fa fa-close" id="close"></i>
	<div id="map">
		
	</div>
</div>
<?php
include_once "dbconnection.php";

echo"<h1> LIST OF ALL REPORTED CRIMES </h1><br>";
echo"<hr>";
$query = "SELECT * FROM crime";
$result = mysqli_query($conn,$query);
$num = mysqli_num_rows($result);
echo'<link rel="stylesheet" type="text/css" href="css/crimestatus.css">';
if($num>0){
	echo "<style> table,tr,th,td{border: 1px solid;}
	table{
	margin-top:100px;

}h1{
	text-align:center;
}
button{
	margin-top: 100px;
	margin-left: 600px;
	width:180px;
	height:50px;
	border-radius:10px;
	font-size:120%;
}  </style>";
	echo"<table>";
		echo"<tr>
			<th>crime_id </th>
			<th>crime_type </th>
			<th>crime_description </th>
			<th>crime_location </th>
			<th>crime_date </th>
			<th>username </th>
			<th>status </th>
			<th>location</th>
		      </tr>";
	while ($row = mysqli_fetch_assoc($result)) {
				$crime_id=$row["crime_id"];
		      	$crime_type=$row["crime_type"];
		      	$crime_description=$row["crime_description"];
		      	$crime_location=$row["crime_location"];
		      	$crime_date=$row["crime_date"];
		      	$username=$row["username"];
		      	$status=$row["status"];
		      	$latitude=$row["latitude"];
		      	$longitude=$row["longitude"];

		      	echo"<tr>";
		      	echo"<td> $crime_id</td>
		      			<td> $crime_type</td>
		      			<td> $crime_description</td>
		      			<td> $crime_location</td>
		      			<td> $crime_date</td>
		      			<td> $username</td>
		      			<td> $status</td>
		      			<td data-long='$longitude' data-lat='$latitude' class='location'>view report location</td>";

		      	echo"</tr>";
	}
	echo "</table>";
}else{
		echo"<P>  NO RESULTS FOUND!! </p>";
	}

	      ?>



<script type="text/javascript">
	$('.location').on('click', function(){
		var lat = $(this).attr('data-lat');
		var long = $(this).attr('data-long');

		myMap(lat,long);
		$("#my_map").show();
	});

function myMap(latitude,longitude){

	navigator.geolocation.getCurrentPosition(function(position){
	var lat = Number(latitude);
	var long = Number(longitude);
     var options = {
     zoom : 15,
     center: {lat: lat, lng:long}
        };
       

    var map = new google.maps.Map(document.getElementById('map'), options);

    var pointer = new google.maps.Marker({
        position:{lat: lat, lng:long},
        map:map
    });

});


}



$('#close').on('click', function(){
	$("#my_map").hide();
})
</script>	      
</body>

</html>
