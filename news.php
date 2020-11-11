


 <!DOCTYPE html>
 <html>
 <head>
 	<title>read news</title>
 	<meta charset="utf-8">
 	<meta name="viewport">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<style type="text/css">
 		*{
 			padding: 0;
 			margin: 0;
 		}

 		img{
 			width: 100%;
 			height: 100%;
 		}

 		body{
 			background-color: #666;
 		}

 		.news_div{
 			
 			color: white;
 			height: 500px;
 			padding: 10px;
 			width: 50%;
 			margin:  0 auto;
 			margin-top: 15px;
 			box-shadow: 0 0 10px white;
 			overflow: hidden;
 		}

 		.news_img{
 			height: 300px;
 			width: 50%;
 			margin: 0 auto;
 		}

 		.news_details{
 			height: 180px;
 			width: 100%;
 			overflow-y: scroll;
 			text-align: center;
 		}

 		/* media queries */
 		@media screen and (max-width: 768px){
 			.news_div{
 				width: 65%;
 			}
 		}

 		@media screen and (max-width: 425px){
 			.news_div{
 				width: 100%;
 			}
 		}

 		/* end media queries */
 	</style>
 </head>
 <body>
 <?php 
include_once "dbconnection.php";
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
				echo"<div class='news_div' >";
				echo "posted by ".$admin."  : ".$time."";
				echo"<div class='news_img'><img src='$path'></div> ";
				
					echo"<div class='news_details'>$news_description</div>";
					
					echo"</div>";
				
			}
	
		}else{
			// there is nothing to display
			echo"<p> no news uploaded yet </p>";
		}


 ?>

 
 </body>
 </html>