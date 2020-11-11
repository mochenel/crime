<?php
include_once "dbconnection.php";
session_start();
if(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
	
}

?>

<!doctype html>
<html>
<head>
<title>
admin home page
</title>
<link rel="stylesheet" href="css/min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>

*{
	margin:0;
	padding:0;
}

#container{
	background:#333;
	min-height:50px;
	width:100%;
	position:relative;

}

#menu{
	background:rgba(0,0,0,0.7);
	color:white;
	height:100vh;
	
	width: 98.5%;
	
	padding:10px;
	position: fixed;
	display:none;
	z-index:100;

}

.fa-close{
	font-size:25px;
	color:red;
	position:absolute;
	right:20px;
}
.fa-close:hover{
	font-size:27px;
	color:white;
	cursor:pointer;
	
}

#nav{
	position:fixed;
	width:100%;
	height:50px;

}

#fa-bars{
	color:white;
	position:absolute;
	top:10px;
	left:30px;
	font-size:25px;
}

.fa-bars:hover{
	cursor:pointer;
}

#menu_items{
	background:#333;
	width:400px;
	height:100vh;
	color:white;
	padding:10px;
	border-radius:10px;
	border:1px solid silver;
	text-align:center;
	list-style-type:none;
}


#menu_items li{
	border-bottom-left-radius:10px;
	margin-top:10px;
	border-bottom:1px solid silver;
	padding:10px 0;
	color:white;
}

#menu_items li a{
	color:white;
}

#menu_items li:hover{
	background:black;

}


#body{
	min-height:500px;
	position:relative;
	width:100%;
	background:#333;
	color:white;
	text-align:center;
	
}

#id_form{

	
	color:white;
	text-align:center;
	padding:10px;
	box-shadow:0 0 10px white;

	
}

input{
	width:100%;
	border-radius:10px;
	border:0;
	font-size:20px;
	padding:5px;
}

#search_crime_id{
	width:100%;
	border-radius:10px;
	border:0;
	background:linear-gradient(lime,green,lime);
	color:white;
	margin-top:10px;
	padding:10px 0;

}

#assign_button{
	width:100%;
	border-radius:10px;
	border:0;
	background:linear-gradient(lime,green,lime);
	color:white;
	margin-top:10px;
	padding:10px 0;
}

#button3{
	width:100%;
	border-radius:10px;
	border:0;
	background:linear-gradient(lime,green,lime);
	color:white;
	margin-top:10px;
	padding:10px 0;
}
#wrap0{
	width:50%;
	padding:10px 0;
	margin:0 auto;
	margin-top:10px;


}

#wrap{
	width:50%;
	padding:10px 0;
	margin:0 auto;
	margin-top:10px;

}

#wrap2{
	width:50%;
	padding:10px 0;
	margin:0 auto;
	margin-top:10px;
	
}

#form2{
	box-shadow:0 0 10px white;
	color:white;
	text-align:center;
	padding:10px;
}
#form3{
	
	color:white;
	text-align:center;
	padding:10px;
	box-shadow:0 0 10px white;
}

#welcome{
	padding:35px 0;
}

#footer{
	text-align:center;
	height:60px;
	background:#333;
	width:100%;
	color:white;
	padding:20px;
	border-top:1px solid silver;
}



</style>
</head>
<body>
<div id="container">
<div id="nav">
<p id="fa-bars"><i class='fa fa-bars'></i></p>
<div id="logo">
</div>
</div>



</div>
<div id="menu">
<i class="fa fa-close"></i>
<ul id="menu_items">
	
<li><a href="allcrimedetails.php"> see all reported crimes</a> </li>
<li><a href="criminaldetails.php">see all criminal details </a> </li>
<li><a href="allinvestigators.php">see all police officers details </a> </li>
<li><a href="addnews.php">add news </a> </li>
<li><a href="feedbackreview.php">read feedbacks </a> </li>
<li><a href="">see all questions </a> </li>
<li><a href="adminchats.php"> chat with investigator </a> </li>
<li><a href="signupp.php"> add new investigator </a> </li>
<li><a href=""> investigators who are currently working on cases </a> </li>
<li> <a href="main.php"  style='color:red;'><i class='fa fa-power-off' style="float:left;"></i> log out </a> </li>
</ul>
</div>



<div id="body">
<h1 id="welcome">WELCOME  ADMIN </h1>
<div id="wrap0">


<h2> search crime by id</h2> 
<form method="post" action="" id="id_form">
<input type="search" name="crime_id"  placeholder="enter crime id.." required> <button type="submit" name="search_crime_id" id="search_crime_id"> submit search </button>
</form>
<br>
<?php
if(isset($_POST["search_crime_id"])){
	$crime_id = $_POST["crime_id"];
	$search = "SELECT * FROM crime WHERE crime_id='$crime_id';";
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
</div>

<div id="wrap">

<h2> assigning crime to investigator</h2> 
<form method="post" id="form2" action="">
crime id:&nbsp&nbsp<input type="number" placeholder="crime id.." name="id"> <br>
username:<input type="text" placeholder="username.." name="police_key"><br>
<button type="submit" name="assign" id="assign_button"> assign </button><br>
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


</div>

<div id="wrap2">
<h2> searching investigator  by id no, username,phone number or police station</h2> 
<form method="post" id='form3' action="">
<input type="search" name="investigator"> <button type="submit" id="button3" name="police" placeholder="search text.."> submit search </button>
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



</div>



<div id='footer'>

	online crime reporting system

</div>


</div>
<script>
var a = [0,1];
$(".fa-bars").on('click', function(){



	

	if(a[0] == 0){
		$("#menu").show(1000);
		a[0] = 1;
		



	}else{
		if(a[0] == 1){
		$("#menu").hide(1000);
		a[0] = 0;
		

	}
	}
	
	

});


$(".fa-close").on('click',function(){
	$("#menu").hide(1000);
});

// email 
//const transport = mail.createTransport({
//    service: 'gmail',
//    host: 'smtp.ethereal.email',
//    port: 587,
//    secure: false,
//    auth: {
//      user: '',
//      pass: ''
//    }
//  })

  
//var mailOptions = {
//    from: '',
//    to: '',
//    subject: 'testing',
//    text: `i love programming`
//  };
  
  //transport.sendMail(mailOptions, function(error, info){
  //  if (error) {
  //    console.log(error);
  //  } else {
  //    console.log('Email sent: ' + info.response);
  //  }
  //})

  ///https://myaccount.google.com/lesssecureapps

</script>
</body>
</html>