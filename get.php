<?php
include 'src/Connection.php';   // include Connection file

// Headers
header('Access-control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorisation,X-Requested-With');

$table = 'student';        // table name

// Recive data from api url
$data = json_decode(file_get_contents("php://input"));

// Default sql query to read all data from table
$query = $Conn->prepare("SELECT * FROM $table");

if(isset($_GET['id']))      // check if id passed in the parameter
{ 
    // prepare query to get single value corresponding to an student id
    $query = $Conn->prepare("SELECT * FROM $table WHERE id = ?");

    $query->bind_param("i", $_GET['id']);       // bind an integer parameter id into the query
}

if($query->execute())              // execute the query and check if its executed successfully
{
    $students = $query->get_result()->fetch_all(MYSQLI_ASSOC);  // fetch result as an associative array
}

if(!empty($students))       // check if its return an empty array
{
    echo json_encode($students);        // print the data into json format
    http_response_code(200);            // return http status code 200
}
else
{
    echo json_encode(["error"=>"no record found"]);
    http_response_code(404);
}

?>