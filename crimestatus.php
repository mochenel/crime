<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/crimestatus.css">
</head>
<body>
	<h1 style="text-align: center;">Crime status</h1>
	<div id="shell">
<?php
include_once "dbconnection.php";
session_start();
$username = $_SESSION["username"];
$crime = "SELECT * FROM crime WHERE username='$username';";
$result = mysqli_query($conn,$crime);
$num = mysqli_num_rows($result);

if($num>0){
	//echo'<link rel="stylesheet" type="text/css" href="css/crimestatus.css">';
		echo '<style>table, th, td {
  border: 1px solid black;
  margin-left:400px;
}table{
	margin-top:100px;
}
button{
	margin-top: 100px;
	margin-left: 600px;
	width:180px;
	height:50px;
	border-radius:10px;
	font-size:120%;
}
   </style>';
	echo"<table>";
	echo "<tr>";
	echo"<th>crime_type </th>
		 <th>crime_description </th>
		 <th>crime_location </th>
		 <th>crime_date </th>
		 <th>status</th>";
	echo "</tr>";
	while($row=mysqli_fetch_assoc($result)){
		$crime_type = $row["crime_type"];
		$crime_description=$row["crime_description"];
		$crime_location=$row["crime_location"];
		$crime_date=$row["crime_date"];
		$status=$row["status"];
		echo "<tr>";
		echo"<td>$crime_type </td>
		 <td>$crime_description </td>
		 <td>$crime_location </td>
		 <td>$crime_date </td>
		 <td>$status </td>";
		 echo "</tr>";

	}
	echo"</table>";

}else{
	echo"<h3> NO crime status, please report the crime first!!</h3>";
}
?>


<form method="post" action="reporter.php">
	<button type="submit">Cancel</button>
</form>
</div>
</body>
</html>