<?php
include_once "dbconnection.php";
$sql = "select crime_type,count(crime_type) as frequency from crime group by crime_type";
$f = "select * from crime";
$res = mysqli_query($conn,$f);
$sum =mysqli_num_rows($res);
echo "<style> 
body{
  text-align: center;
  background: url(main2.png);
  background-size: cover;
  font-family: sans-serif;
  font-size: 130%;
}
table{
	margin-top:100px;
	width:800px;
	height:300px;
	text-align:center;
	margin-left:300px;
}
      th,td{
      	border:1px solid black;
      }button{
      	text-align:center;
      	margin-top:50px;
      	width:150px;
      	height:35px;
      	border-radius:10px;
      	background-color:grey;
      	font-size:100%;
      }button:hover{
      	
      	width:170px;
      	height:38px;
      	border-radius:12px;
      	background-color:grey;
      	font-size:100%;

      }
      </style>";

echo "<table>";
echo"<tr>  
	<th> crime_type </th> 
	<th> rate </th> 
	</tr>";
$result = mysqli_query($conn,$sql);
$crime_type=array();
$data=array();
if(mysqli_num_rows($result)>0){
 while($row=mysqli_fetch_assoc($result)){
 	$crime_type=$row["crime_type"];
 	$data= $row["frequency"];
 	$rate = ($data/$sum)*100;
 	$rate =round($rate,2);
 	echo"<tr>";
 	echo "<td>".$crime_type."</td>";
 	echo "<td>".$rate."%</td>";
 	echo "</tr>";
 
 }
}else{
	echo"<p> no crime committed yet </p>";
}
echo "</table>";
echo'
	<form action="admin.php">
	<button type="submit" name=""> Cancel </button>
	</form>';



?>