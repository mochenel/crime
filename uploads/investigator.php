<?php
/*include_once "dbconnection.php";
session_start();
if(isset($_SESSION["username"])){
	$username=$_SESSION["username"];
}*/

?>

<!doctype html>
<html>
<head>
<title>
investigator's home page
</title>
<link rel="stylesheet" type="text/css" href="css/officers.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<div id="container">
	<div class="nav">
		<i class="fa fa-bars menu"></i>
	</div>
	<div class="nav_bar">
		
			

			<div id="sidebar">
					<i class="fa fa-close close"></i>
					<ul>
						<li> <a href="main.php" > log out </a> </li>
						<li> <a href="" > view news </a> </li>
						<li> <a href="chat.php" > chat with admin </a> </li>
						<li> <a href="criminal.php" > record criminal details </a> </li>

					</ul>

			</div>
		
	</div>
<h1 class="header_"> INVESTIGATORS'S HOME PAGE  </h1>


<form method="post" action="">
	<button type="submit" name="notification">notification</button>
</form>

<?php
 	/*if(isset($_POST["notification"])){
 		$q = "SELECT * FROM assignment WHERE police_username='$username'";
 		$result = mysqli_query($conn,$q);
 		$num=mysqli_num_rows($result);
 		if($num>0){
 				echo '<style>table, th, td {
  border: 1px solid black;
}
   </style>';
 			echo" you have new case to investigate<br><br>";
 			echo"<h5> CRIME DETAILS </h5>";
 			echo "<table>";
 			echo"<tr>";
 			echo"<th>crime_id </th>
 				 <th>crime_type </th>
 				 <th>crime_description </th>
 				 <th>crime_location </th>
 				 <th>crime_date </th>
 				 <th>reported by </th>
 				 <th>status </th>";
 			echo "</tr>";
 			while($row = mysqli_fetch_assoc($result)){
 				$id=$row["crime_id"];
 			}
 			$crime = "SELECT * FROM crime WHERE crime_id='$id'";
 			$result = mysqli_query($conn,$crime);
 			while($row = mysqli_fetch_assoc($result)){
 				$crime_id = $row["crime_id"];
 				$crime_type =$row["crime_type"];
 				$crime_description =$row["crime_description"];
 				$crime_location=$row["crime_location"];
 				$crime_date=$row["crime_date"];
 				$username=$row["username"]; // reporter
 				$status=$row["status"];
 				echo "<tr>";
 				echo"<td>$crime_id </td>
 				 <td>$crime_type </th>
 				 <td>$crime_description </td>
 				 <td>$crime_location </td>
 				 <td>$crime_date </td>
 				 <td>$username </td>
 				 <td>$status </td>";
 			echo "</tr>";

 			}
 			echo "</table>";
 			echo"<h5> CRIME EVIDENCE </H5>";
 			$evidence="SELECT * FROM evidence WHERE crime_id='$id'";
 			$result=mysqli_query($conn,$evidence);
 			$num=mysqli_num_rows($result);
 			if($num>0){
 				echo"<table>";
 				while ($row=mysqli_fetch_assoc($result)) {
 					# code...
 					$location=$row["location"];
 					echo "<tr>";
 					echo"<img src='$location'width='400' height='300' download><br>";
 					echo "<a href='$location' download='evidence'> download picture</a>";
 					echo "</tr>";
 				}
 				echo"</table>";
 			}else{
 				echo"<B><i>there is no evidence for this crime</i></B>";
 			}

 		}else{
 			echo"you have not been assigned a crime yet";
 		}
 	}*/
?>
</div>








</div>


<script type="text/javascript">
	

	$('.menu').on('click', function(){
	
		$('.nav_bar').show(1000);
	});

	$('.close').on('click', function(){
		
		$('.nav_bar').hide(1000);

	});

</script>
</body>
</html>