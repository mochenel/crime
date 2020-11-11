<?php
include_once "dbconnection.php";
$q = "SELECT * FROM criminal ";
$result = mysqli_query($conn,$q);
$num = mysqli_num_rows($result);
echo'<link rel="stylesheet" type="text/css" href="css/crimestatus.css">';
if($num>0){
		echo '<style>table, th, td {
  border: 1px solid black;
}
table{
	margin-top:100px;
	margin-left:300px;

}h1{
	text-align:center;
}
 img{
	margin-left:-2px;
}
   </style>';
	echo "<table >";

	echo "<tr>
		  <th> Surname </th>
		  <th> Full Names</th>
		  <th> ID_Number</th>
		  <th> Address</th>
		  <th> Dtae of arrest</th>
		  <th> image </th>
		  </tr>";
		  while ($row=mysqli_fetch_assoc($result)) {
		  	 $surname=$row["surname"];
		  	 $full_names=$row["full_names"];
		  	 $id=$row["criminal_id_number"];
		  	 $address=$row["address"];
		  	 $date=$row["date_of_arrest"];
		  	 $image=$row["criminal_image"];
		  	 echo "<tr>
		  	 		<td>$surname</td>
		  	 		<td>$full_names</td>
		  	 		<td>$id</td>
		  	 		<td>$address</td>
		  	 		<td>$date</td>
		  	 		<td><img src='$image' width='70' height='60' ></td>
		  	 		</tr>";
		  }
		  echo "</tabel>";

} else{
	echo "there are no criminals yet";
}
echo"<br>";
?>