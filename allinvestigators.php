<?php
include_once "dbconnection.php";

echo"<h1> LIST OF ALL INVESTIGATORS DETAILS </h1><br>";
echo'<link rel="stylesheet" type="text/css" href="css/crimestatus.css">';
echo"<hr>";
$q = "SELECT * FROM member WHERE police_station <> '' ";
$result = mysqli_query($conn,$q);
$num = mysqli_num_rows($result);
if($num>0){
	echo "<style>table,tr,th,td{border:1px solid} </style>";
	echo"<table>";
		echo"<tr>
			<th>f_name </th>
			<th>l_name </th>
			<th> contact </th>
			<th>email </th>
			<th> address </th>
			<th>id_number </th>
			<th>username </th>
			<th>police station </th>
			<th>station_contact </th>
			<th>gender </th>
		      </tr>";
	while ($row = mysqli_fetch_assoc($result)) {
				$f_name=$row["f_name"];
		      	$l_name=$row["l_name"];
		      	$contact=$row["mobile_number"];
		      	$email=$row["email"];
		      	$address=$row["address"];
		      	$id_number=$row["id_number"];
		      	$username=$row["username"];
		      	$police_station=$row["police_station"];
		      	$station_contact=$row["station_tel_number"];
		      	$gender=$row["gender"];

		      	echo"<tr>";
		      	echo"<td> $f_name</td>
		      			<td> $l_name</td>
		      			<td> $contact</td>
		      			<td> $email</td>
		      			<td> $address</td>
		      			<td> $id_number</td>
		      			<td> $username</td>
		      			<td> $police_station</td>
		      			<td> $station_contact</td>
		      			<td> $gender</td>";

		      	echo"</tr>";
	}
	echo "</table>";
}else{
		echo"<P>  NO RESULTS FOUND!! </p>";
	}