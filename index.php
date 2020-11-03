<?php

// this is a simple php api

// include database connection file
include "assets/conection.php";

// run query on database
$sql = " select * from data ";
$result = mysqli_query($con, $sql);

if($result) {
	$i = 0;
	// define content type
	header("Content-Type: application/JSON");
	// fetch data from database
	while($row = mysqli_fetch_assoc($result)) {

		$response[$i]['id'] = $row['id'];
		$response[$i]['name'] = $row['name'];
		$response[$i]['subject'] = $row['subject'];
		$response[$i]['studentcode'] = $row['studentcode'];
		$response[$i]['region'] = $row['region'];
		$response[$i]['phone'] = $row['phone'];
		$response[$i]['email'] = $row['email'];

		$i++;
	}
		// convert php object into JSON format
		$json_data = json_encode($response, JSON_PRETTY_PRINT);
		echo $json_data;
}

?>