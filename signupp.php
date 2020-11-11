<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
		
</head>
<body>
	
	<div class="register">
	    <h2>Signing up new investigator</h2>
	 <form method="POST" id="register" action="signupp.action.php">
		<label>First Name :</label><br>
		<input type="text" name="f_name" id="name" placeholder="Enter your First Name" pattern="[A-Za-z]+" title="numbers and special characters are not allowed" required><br><br>

		    <label>Last Name :</label><br>
 		<input type="text" name="l_name" id="name" placeholder="Enter your Last Name" pattern="[A-Za-z]+" title="numbers and special characters are not allowed" required><br><br>  


		<label>Mobile Number :</label><br>
		  
		    <input type="text" name="mobile_number" id="num" placeholder="Enter your Mobile Number" pattern="[0-9]{10}" title="10 digits allowed" required><br><br>

		<label>Email :</label><br>
		  <input type="email" name="email" id="name" placeholder="Enter your Email Address" required><br><br>

		  <label> Address :</label><br>
 		<textarea cols="30" rows="7" name="address"></textarea><br>

 		<label>ID Number :</label><br>
		  <input type="text" name="id_number" id="name" placeholder="Enter your ID number" pattern="[0-9]{13}" title="13 digits allowed " required><br><br>

		<label >Username :</label><br>
		  <input type="text" name="username" id="name" placeholder="Enter your Username" required><br><br>

		  	<label >Police station :</label><br>
		  <input type="text" name="police_station" id="name" placeholder="Enter station name" required><br><br>

		  	<label >Station_tel_number :</label><br>
		  <input type="text" name="station_tel_number" id="name" placeholder="Enter tel-number" pattern="[0-9]{10}" title="10 digits allowed" required><br><br>

		<label>Password :</label><br>
		  <input type="password" name="pwd" id="name" placeholder="Enter your Password" minlength="3" required><br><br>

		<label>Re-Enter Password :</label><br>
		  <input type="password" name="cpwd" id="name" placeholder="Confirm your Password" minlength="3" required><br><br>
        
        <input type="radio" name="gender" id="male" value="m"><span id="male">&nbsp; Male</span>&nbsp;&nbsp;
		<input type="radio" name="gender" id="male" value="f"><span id="male">&nbsp; FeMale</span>&nbsp;&nbsp;
		<br><br>
		<button type="submit" name="submit" id="sub" >sign up</button>
		<a href="admin.php"><button type="submit" name="submit" id="sub" >Cancel</button></a>
		

		</form>
		<br>
	<?php
		if(isset($_GET["exist"])){
			echo "<p>mobile number,email, id number or username cannot be used again</p>";

	}
		if(isset($_GET["errorid"])){
			echo "<p>id number does not match with the gender</p>";

	}
		if(isset($_GET["notmatch"])){
			echo "<p>passwords don't match</p>";

	}
		if(isset($_GET["invalid"])){
			echo "<p>id number should contain 13 digits</p>";

	}
		if(isset($_GET["success"])){
			echo "<p> signed up successfully</p>";

	}
		if(isset($_GET["tel"])){
			echo "<p> invalid tel number</p>";

	}
	?>
	</div>


</body>

</html>