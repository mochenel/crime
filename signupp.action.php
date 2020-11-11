<?php
include_once "dbconnection.php";
if(isset($_POST["submit"])){
	$f_name=$_POST["f_name"];
	$l_name=$_POST["l_name"];
	$mobile_number=$_POST["mobile_number"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	$id_number=$_POST["id_number"];
	$username=$_POST["username"];
	$pwd=$_POST["pwd"];
	$cpwd=$_POST["cpwd"];
	$gender=$_POST["gender"];
	$police_station=$_POST["police_station"];
	$station_tel_number=$_POST["station_tel_number"];
	$check = "SELECT * FROM member WHERE 
			   mobile_number='$mobile_number'
			   OR email='$email'
			   OR id_number='$id_number'
			   OR username='$username';";
			   $result = mysqli_query($conn,$check);
			   $num = mysqlI_num_rows($result);
			   if($num>0){
			   	//cannot register 
			   	header("Location: signupp.php?exist");

			   }else{
			   	//can register
			   	$id =strlen($id_number);
			   	if($id==13){
			   		// valid id
			   		if($pwd==$cpwd){
			   			// pwd match
			   			$pwd = password_hash($pwd, PASSWORD_DEFAULT);
			   			$id_num=strval($id_number); 
			   			$num = substr($id_num,6,4);
			   			$value = (int)$num;
			   			if(($value<5000 AND $gender=="f") OR ($value>=5000 AND $gender=="m")){
			   				// gender matches with id number
			   				
			   				$phone = strlen($mobile_number);
			   				$station_tel=strlen($station_tel_number);
			   				if( $phone==10 AND $station_tel==10){
			   				$insert = "INSERT INTO member VALUES
			   					('$f_name',
			   					'$l_name',
			   					'$mobile_number',
			   					'$email',
			   					'$address',
			   					'$id_number',
			   					'$username',
			   					'$police_station',
			   					'$station_tel_number',
			   					'$pwd',
			   					'$gender');";
			   					mysqli_query($conn,$insert);
			   					header("Location: signupp.php?success");
			   				}else{
			   					header("Location: signupp.php?tel");
			   				}
			   			}else{
			   				// gender does not match with id number
			   				header("Location: signupp.php?errorid");
			   			}


			   		}else{
			   			//pwd not match
			   			header("Location: signupp.php?notmatch");

			   		}

			   	}else{
			   		// invalid id number
			   		header("Location: signupp.php?invalid");
			   	}
			   }



}




