
<?php
include_once "dbconnection.php";
session_start();
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
	<title> criminal details</title>
	<link rel="stylesheet" type="text/css" href="css/crime.css">
</head>
<body>
	<h1>Record criminal details here</h1>
	<div class="shell">
<form method="post" action="" enctype="multipart/form-data">
	Surname &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="surname" required><br><br>
	Full names &nbsp&nbsp <input type="text" name="full_names" required><br><br>
	ID_Number : <input type="text" name="id_number"><br><br>
	Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <textarea name="address" rows="5" cols="25" required></textarea> <br><br>
	Date of Arrest: <input type="Date" name="date" required><br><br>
	Picture &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="file" name="file" required><br><br>
	<button type="submit" name="submit">submit</button>
	<a href="investigator.php"><button type="button">Cancel</button></a>
</form>
</div>
<?php
if (isset($_POST["submit"])) {
	// checking whether investigator has been assigned crime or not
	$q = "SELECT * FROM assignment WHERE police_username='$username';";
	$result = mysqli_query($conn,$q);
	$num = mysqli_num_rows($result);
	if ($num>0) {
		# investigator has been assigned crime
		# getting crime id 
		if ($row = mysqli_fetch_assoc($result)) {
			$crime_id = $row["crime_id"];
		}
		#checking crime status ( only 'in progress' status considered )
		$q = "SELECT * FROM crime WHERE crime_id='$crime_id' AND status='in progress'";
		$result=mysqli_query($conn,$q);
		$num=mysqli_num_rows($result);
		if($num>0){
			// waiting for investigator to return status
			// getting data from form
			$surname=$_POST["surname"];
			$full_names=$_POST["full_names"];
			$id_number=$_POST["id_number"];
			$address=$_POST["address"];
			$date=$_POST["date"];
			$datetime = new datetime($date);  // creating DateTime object 
		$date_of_arrest= date_format($datetime,"y-m-d"); // changing the format of date as to make it compatible with mysql date format
		// now dealing with file(image)
		$file = $_FILES["file"];
		$name=$file["name"];
		$size=$file["size"];
		$error=$file["error"];
		$tmp_name=$file["tmp_name"];
		$allowed = array('jpg' ,'jpeg','png' ); // creating array variable to store allowed file extensions
		// getting extension from file and examine with respect to allowed extensions
		$ext = explode(".", $name);
		$ext=end($ext);
		$ext=strtolower($ext);
		if(in_array($ext, $allowed)){
			// extension is allowed
			if($size<50000000){ // limiting file size
				// file size falls within the range of acception
				if($error==0){ // checking whether file has an error or not
					// file does not have error
					$newname=uniqid("",true)."".$name; // creating file new name
					$destination="criminal/".$newname; // creating destination string
					if(move_uploaded_file($tmp_name, $destination)){
						// file is in criminal folder
						// now data should be stored in criminal table
					   $q = "INSERT INTO criminal VALUES('$surname',
														 '$full_names',
														 '$id_number',
														 '$address',
														 '$date_of_arrest',
														 '$destination',
														 '$username',
														 '$crime_id')";
														 if(mysqli_query($conn,$q)){
														 	// date stored
				
													 	// now it's time to update crime status
														 	$q="UPDATE crime SET status='solved'
														 		 WHERE crime_id='$crime_id' AND status='in progress'";
														 		if(mysqli_query($conn,$q)){
														 			// goal reached successfully
														 			echo"<p> criminal details recorded successfully</p>";

														 		}else{
														 			// error occured
														 			echo "<p> update error occured </p>";
														 		}
														 }else{
														 	//data not stored
														 	echo"<p> error occured </p>";
														 }
					}else{
						// file is not uploaded
						echo "<p> error occured when storing file in criminal folder </p>";
					}

				}else{
					// file has an error
					echo "<p> file has an error, please fix it or upload another one </p>";
				}

			}else{
				// file size is too big
				echo "<p> file size is too big </p>";
			}
		}else{
			// extension is not allowed
			echo"<p> you cannot upload files of this type </p>";
		}

		}else{
			// investigator already returned status
			echo"<p> please wait for another case </p>";
		}


	}else{
		echo"<p> you must not enter the criminal details if you have not been assigned a case </p>";
	}


}

?>
</body>
</html>