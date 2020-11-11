<?php
include_once "dbconnection.php";
session_start();
if(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
	
}
else{
		header("Location: main.php");
}
?>

<!doctype html>
<html>
<head>
<title>
admin home page
</title>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>

	<div id="sidebar">
	<div class="toggle-btn" onclick="toggleSidebar()">

  <span></span>

  <span></span>

  <span></span>

</div>
<div>
<ul>
	<li > <a style="color: red;" href="main.php" > log out </a> </li>
	<li><a href="bargraph.php"> investigators who are currently on cases</a> </li>
<li><a href="allcrimedetails.php"> see all reported crimes</a> </li>
<li><a href="criminaldetails.php">see all criminal details </a> </li>
<li><a href="allinvestigators.php">see all police officers details </a> </li>
<li><a href="addnews.php">add news </a> </li>
<li><a href="feedbackreview.php">read feedbacks </a> </li>
<li><a href="adminchats.php"> chat with investigator </a> </li>
<li><a href="signupp.php"> add new investigator </a> </li>
</ul>
</div>
</div>
<script>

function toggleSidebar(){

  document.getElementById("sidebar").classList.toggle('active');

  }

</script>
<div id="box">

<br><br>
<h4> <i>search crime by id or status</i></h4> 
<form method="post" action="">
<input type="search" name="crime_id" required> <button type="submit" name="search_crime_id"> submit search </button>
</form>
<br>
<?php
if(isset($_POST["search_crime_id"])){
	$crime_id = $_POST["crime_id"];
	$search = "SELECT * FROM crime WHERE crime_id='$crime_id' OR status='$crime_id';";
	$result = mysqli_query($conn,$search);
	$num = mysqlI_num_rows($result);
	if($num>0){
		// search success
			echo '<style>table, th, td {
  border: 1px solid black;
}
   </style>';

		echo"<table>";
		echo"<tr>
			<th>crime_id </th>
			<th>crime_type </th>
			<th>crime_description </th>
			<th>crime_location </th>
			<th>crime_date </th>
			<th>username </th>
			<th>status </th>
		      </tr>";
		      while($row = mysqli_fetch_assoc($result)){
		      	$crime_id=$row["crime_id"];
		      	$crime_type=$row["crime_type"];
		      	$crime_description=$row["crime_description"];
		      	$crime_location=$row["crime_location"];
		      	$crime_date=$row["crime_date"];
		      	$username=$row["username"];
		      	$status=$row["status"];
		      	echo"<tr>";
		      	echo"<td> $crime_id</td>
		      			<td> $crime_type</td>
		      			<td> $crime_description</td>
		      			<td> $crime_location</td>
		      			<td> $crime_date</td>
		      			<td> $username</td>
		      			<td> $status</td>";

		      	echo"</tr>";

		      }
		echo "</table>";
	}else{
		echo"<P>  NO RESULTS FOUND!! </p>";
	}

}

?>
<h4> <i>assigning crime to investigator</i></h4> 
<form method="post" action="">
crime id:&nbsp&nbsp&nbsp&nbsp<input type="text" name="id" 
required pattern="[0-9]+" 
 title="only digits allowed "> <br>
username:<input type="text" name="police_key" required><br>
<button type="submit" id="assign" name="assign"> assign </button><br>
</form>
<?php
if(isset($_POST["assign"])){
	$id=$_POST["id"]; // storing crime id into variable $id
	$police_key=$_POST["police_key"]; // storing investigator's username into variable $police_officer
	$q1= "SELECT * FROM crime WHERE crime_id='$id';";
	$q2 = "SELECT * FROM member WHERE username='$police_key' AND police_station <> '';";
	$r1 = mysqli_query($conn,$q1);
	$num1 = mysqli_num_rows($r1);
	$r2 = mysqli_query($conn,$q2);
	$num2 = mysqli_num_rows($r2);
	if($num1>0 AND $num2>0){
		$date = date("y-m-d");
		$insert = "INSERT INTO assignment(police_username,admin_username,crime_id,assign_date)
		           VALUES('$police_key','$username','$id','$date')";
		           if(mysqli_query($conn,$insert)){
		           	echo"crime id ".$id. " is assigned to ".$police_key;
		           	$update = "UPDATE crime SET status='in progress' WHERE crime_id='$id';";
		           	mysqli_query($conn,$update);
		           }else{
		           	echo "assignment failed!!";
		           }

	}else{
		echo"<p> enter the correct assignment details </p>";
	}
	
}

?>
<h4> <i>searching investigator  by id no, username,phone number or police station</i></h4> 
<form method="post" action="">
<input type="search" name="investigator" required> <button type="submit" name="police"> submit search </button>
</form>
<?php
if(isset($_POST["police"])){
	$investigator=$_POST["investigator"];
	$search="SELECT * FROM member WHERE police_station <>'' AND
	 (id_number='$investigator' OR username='$investigator'OR mobile_number='$investigator'
	 OR station_tel_number='$investigator' OR police_station='$investigator')";
	 $result=mysqli_query($conn,$search);
	 $num = mysqli_num_rows($result);
	 //echo $num;
	 if($num>0){
	 		echo '<style>table, th, td {
  border: 1px solid black;
}
   </style>';
	 	echo"<table>";
	 	echo"<tr>";
	 	echo "<th>f_name </th>
	 		 <th>l_name </th>
	 		 <th>mobile_number </th>
	 		 <th>email </th>
	 		 <th>address </th>
	 		 <th> username</th>
	 		 <th>police_station </th>
	 		 <th>station_tel_number </th>
	 		 <th>gender </th>";
	 	echo"</tr>";
	 	while($row = mysqli_fetch_assoc($result)){
	 		$f_name=$row["f_name"];
	 		$l_name=$row["l_name"];
	 		$mobile_number=$row["mobile_number"];
	 		$email=$row["email"];
	 		$address=$row["address"];
	 		$username=$row["username"];
	 		$police_station=$row["police_station"];
	 		$station_tel_number=$row["station_tel_number"];
	 		$gender=$row["gender"];

	 		echo"<tr>";
	 		echo "<td>$f_name </td>
	 		 <td>$l_name </td>
	 		 <td>$mobile_number </td>
	 		 <td>$email </td>
	 		 <td>$address </td>
	 		 <td>$username</td>
	 		 <td>$police_station </td>
	 		 <td>$station_tel_number </td>
	 		 <td>$gender </td>";

	 		echo"</tr>";

	 	}
	 	echo"</table>";
	 } else{
	 	echo"<p> NO RESULTS FOUND!!!</p>";

	 }
}

?>
</div>
</body>
</html>