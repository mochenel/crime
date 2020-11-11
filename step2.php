<?php

include_once "dbconnection.php";// enable accesss to conn variable
session_start(); // starting sessions
	$username = $_SESSION["username"]; // sesssion variable assigned to $username

// action after submit button has pressed
if(isset($_POST["submit"])){
	// storing user  data  into variables
	$longitude = $_POST["longitude"];
	$latitude = $_POST["latitude"];
	$crime_type = $_POST["crime_type"]; 
	$crime_description =$_POST["crime_description"];
	$crime_location = $_POST["crime_location"];
	$crime_date = $_POST["crime_date"];
	$failed = array(); // array variable to record errors of each file 
	$uploaded = array();// array variable to record successfully uploaded files 
	$allow = array("png","jpeg","jpg"); // array variable to store allowed extensions of files 
	if(!empty($_FILES["file"]["name"][0])){ // checking if at least one file is selected
		$file = $_FILES["file"]; // storing information about a file into $file array 
		$count = count($_FILES["file"]["name"]); // counting the number selected files by the use of their names 
		for($i = 0; $i<$count; $i++ ){// looping for $count times so that all files can be processed sequencilly until the last one
			$file_name = $file["name"][$i]; // storing the file name at index $i into variable $file_name
			$file_size = $file["size"][$i];//storing the file size at index $i into variable $file_size
			$file_error = $file["error"][$i]; // storing the file status at index $i into variable $file_error
			$file_tmp_name = $file["tmp_name"][$i]; // storing the file temporary location at index $i into variable $file_tmp_name
			if($file_error==0){ // checking file has an error
				// file has no error
				if($file_size<10240000){
					// there is nothing wrong with file size
					$ext = explode(".", $file_name);
					$ext=strtolower(end($ext));
					if(in_array($ext, $allow)){
						$destination="uploads/".$file_name;
						if(move_uploaded_file($file_tmp_name, $destination)){
							// file uploaded
							$uploaded[]=$file_name;
							//echo"<b>files uploaded</b><br>";
						}else{
							//file not uploaded
							$failed[] = $file_name." not uploaded";
						}

					}else{
						// file extension not allowed
						$failed[] = $file_name." extension( {$ext }) not allowed";
					}

				}else{
					// file size is too big
					$failed[] = $file_name." has size more than 10240000";
				}
			}else{
				// file has an error
				$failed[] = $file_name." has error ";
			}
		}
	}
	echo"<b>files uploaded</b><br>"; 
	foreach ($uploaded as  $value) { // looping through uploaded files 
	echo $value."<br>"; // displayng uploaded files
	}

	echo"<br>";
	$count = count($failed); // counting the number of files failed to be uploaded 
	if($count==0){ // if all user files are uploaded succcessfully then all data can go into the database 
		$datetime = new datetime($crime_date);  // creating DateTime object 
		$crime_date= date_format($datetime,"y-m-d");  // changing the date format into the format compatible with the one in a database
		$crime = "INSERT INTO crime(crime_type, 
				crime_description,
				crime_location,
				crime_date,
				username,
				status,
				longitude,
				latitude) 
				VALUES('$crime_type',
				'$crime_description',
				'$crime_location',
				'$crime_date',
				'$username',
				'pending',
				'$longitude',
				'$latitude')"; // creating insert data query for crime table

				mysqli_query($conn,$crime); // data goes into crime table
				$grap = " SELECT * FROM crime WHERE crime_description='$crime_description'
				 AND crime_type='$crime_type'
				 AND crime_date='$crime_date'
				 AND username='$username';"; // creating query to get the crime_id of the last insertd row
				 $result = mysqli_query($conn,$grap); // query data
				 $num=mysqli_num_rows($result); // getting the number of returned rows
				 if($num>0){
				 	if($row=mysqli_fetch_assoc($result)){ // storing the returned row data into array variable $row
				 		$id=$row["crime_id"]; // getting crime_id into variable $id
				 			foreach ($uploaded as $value) { // looping through uploaded files 
				 				$location = "uploads/".$value; // storing file path into variable $location 
				 			
				 			$evidence = "INSERT INTO evidence(location,username,crime_id)
				 							VALUES('$location','$username','$id')";// creating insert query for evidence table
				 							mysqli_query($conn,$evidence); // insert data into evidence table

				 						}
				 	}
				 	
				 }
				

	}
	if($count>0){ // checking  if they are files failed to be uploaded 
	echo "<b>files not uploaded<br></b><br>";
	foreach ($failed as  $value) { // looping through failed files
	echo $value; // displaying failed files 
	echo"<br> all selected files must be uploaded "; /* giving user notice so that he/she can be sure that all files selected should be uploaded */
}
	}


echo"<br><a href='crime.php'> go back </a>"; // sending user back to crime.php link
}
	

?>