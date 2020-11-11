<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crime');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
include_once "dbconnection.php";
$sql = "select * from assignment";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
//$sql = "select crime_type,(count(crime_type)/$num)*100 as frequency from crime group by crime_type";
$sql = "select police_username,count(police_username) as frequency from assignment JOIN crime on crime.crime_id=assignment.crime_id AND crime.status='in progress' group by police_username";
$query = sprintf($sql);

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;

}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);