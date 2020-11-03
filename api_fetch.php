<html>
<head>
<title>api data</title>
</head>
<link rel="stylesheet" type="text/css "href="assets/style.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
<body>

<?php

// fetch data from api
$data = file_get_contents('http://localhost/api/ownapi/');

// convert JSON object to php object
$api_data = json_decode($data, true);

// count how many rows available in database
$total_rows = count($api_data);

?>

<div class="filter">

<div class="heading">
<h1>Api Data</h1>
</div>
</div>
<!-- creating table -->
<table>
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Subject</th>
	<th>Student Code</th>
	<th>Region</th>
	<th>Phone Number</th>
	<th>E-mail Address</th>
</tr>

<?php

// print fetched data on table
$i = 0;
while ($i < $total_rows) {
	?>
		<tr>
			<td><?php echo $api_data[$i]['id']; ?></td>
			<td> <?php echo $api_data[$i]['name']; ?></td>
			<td> <?php echo $api_data[$i]['subject']; ?></td>
			<td> <?php echo $api_data[$i]['studentcode']; ?></td>
			<td> <?php echo $api_data[$i]['region']; ?></td>
			<td> <?php echo $api_data[$i]['phone']; ?></td>
			<td> <?php echo $api_data[$i]['email']; ?></td>
		</tr>

	<?php
	$i++;
}

?>

</table>

<?php ; ?>

</body>
</html>