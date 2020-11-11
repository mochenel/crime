<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/signup.css">

	<style type="text/css">

		@media screen and (max-width: 425px){
			.register{
				width: 100%;
				margin-top: 5px;
			}
		}
	</style>
</head>
<body>

	<div class="register">
	    <h2> Registeration Form</h2>
	 <form method="POST"  action="signup.action.php">
		<label>First Name :</label><br>
		<input type="text" name="f_name" id="name" placeholder="Enter your First Name" required><br><br>

		    <label>Last Name :</label><br>
 		<input type="text" name="l_name" id="name" placeholder="Enter your Last Name" required><br><br>  


		<label>Mobile Number :</label><br>
		  
		    <input type="text" name="mobile_number" id="num" placeholder="Enter your Mobile Number" pattern="[0-9]{10}" title="10 digits required" required><br><br>

		<label>Email :</label><br>
		  <input type="email" name="email" id="name" placeholder="Enter your Email Address" required=><br><br>

		  <label> Address :</label><br>
 		<textarea cols="30" rows="7" name="address" placeholder="Enter your address"></textarea><br>

 		<label>ID Number :</label><br>
		  <input type="text" name="id_number" id="name" placeholder="Enter your ID number" pattern="[0-9]{13}" title="only 13 digits are allowed" required><br><br>

		<label >Username :</label><br>
		  <input type="text" name="username" id="name" placeholder="Enter your Username" required><br><br>


		<label>Password :</label><br>
		  <input type="password" name="pwd" id="name" placeholder="Enter your Password" required><br><br>

		<label>Re-Enter Password :</label><br>
		  <input type="password" name="cpwd" id="name" placeholder="Confirm your Password" required><br><br>
        
        <input type="radio" name="gender" id="male" value="m"><span id="male">&nbsp; Male</span>&nbsp;&nbsp;
		<input type="radio" name="gender" id="male" value="f"><span id="male">&nbsp; FeMale</span>&nbsp;&nbsp;
		<br><br>
		
		<button type="submit" name="submit" id="sub" >SignUp</button>
		<a href="main.php"><button type="button" name="submit" id="sub" >Cancel</button>
			</a>
		</form>
		
		<br>
	<?php
		if(isset($_GET["exist"])){
			echo "<p style = 'color:red;text-align:center'>mobile number,email, id number or username cannot be used again</p>";

	}
		if(isset($_GET["errorid"])){
			echo "<p style = 'color:red;text-align:center'>id number does not match with the gender</p>";

	}
		if(isset($_GET["notmatch"])){
			echo "<p style = 'color:red;text-align:center'>passwords don't match</p>";

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