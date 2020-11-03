<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "api_data";

$con = mysqli_connect($host, $user, $password, $db);

if($con) {
	// conection successfull
} else {
	?>

	<script>
		alert("Unable to conection with database");
	</script>

	<?php
}

?>