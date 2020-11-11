<?php
session_start();
include_once "dbconnection.php";
$username=$_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>add news </title>
	<link rel="stylesheet" type="text/css" href="css/reporter.css">
</head>
<body>
	<a href="admin.php"> Go back</a>
	<form method="post" action="" enctype="multipart/form-data">
	<h1> news </h1>
	<textarea name="news_description" rows="10" cols="50" required></textarea><br><br>
	<label> select files </label>
	<input type="file" name="file" required><br>
	<br><button type="submit" name="news"> add news</button>
</form>
	<form method="post" action="">
		<br><br><button type="submit" name="all">view all uploaded news </button>
	</form>
	<?php
	if(isset($_POST["all"])){
		// trying to display all uploaded news
		$select = "SELECT * FROM news";
		$result=mysqli_query($conn,$select);
		$num=mysqli_num_rows($result);
		if($num>0){
			// display 
			while ($row=mysqli_fetch_assoc($result)) {
				$news_description=$row["news_description"];
				$path=$row["path"];
				$admin=$row["admin"];
				$time=$row["time"];
				echo"<fieldset>";
				echo "posted by ".$admin."  : ".$time."<br><hr>";
					echo"$news_description <br><hr>";
					echo"<img src='$path'><br> ";
					echo"</fieldset>";
				
			}
	
		}else{
			// there is nothing to display
			echo"<p> no news uploaded yet </p>";
		}
	}
	if(isset($_POST["news"])){
		$file=$_FILES["file"];
		$news_description=$_POST["news_description"];
		$name=$file["name"];
		$size=$file["size"];
		$tmp_name=$file["tmp_name"];
		$error=$file["error"];
		$type=$file["type"];
		$allowed= array("txt","png","jpeg","jpg","doc" );
		$ext=explode(".", $name);
		$ext=strtolower(end($ext));
		if($size<5000000){
			// file size is not a problem
			if($error==0){
				// file does not have error
				if(in_array($ext, $allowed)){
					// file extension is not problem
					$newname=uniqid("",true)."".$name;
					$dest="news/".$newname;
					if(move_uploaded_file($tmp_name, $dest)){
						// file uploaded successfully
						$time = date("y-m-d H:i:s");
						$insert ="INSERT INTO news(news_description,path,admin,time) VALUES('$news_description','$dest','$username','$time')";
						mysqli_query($conn,$insert);

						echo"<p>news uploaded successfully</p>";
					}else{
						// file not uploaded
						echo"<p>error occured when file was trying to be upoaded </p>";
					}
				}else{
					// file extension is not allowed
					echo "you cannot upload files of this type";
				}

			}else{
				// file has an error
				echo"<p> file has an error, try it again or upload another one </p>";
			}


		}else{
			// size is too big
			echo"<p> file size is too big </p>";
		}
		


	}
	?>

</body>
</html>