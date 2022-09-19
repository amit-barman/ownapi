<?php
include 'src/Connection.php';   // include Connection file

// Headers
header('Access-control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorisation,X-Requested-With');

// Recive data from api url
$data = json_decode(file_get_contents("php://input"));

//table name
$table = 'student';

// Cheak if id is given or not
if(isset($data->id))
{
    // prepare sql query to add data into the database
    $query = $Conn->prepare("DELETE FROM $table WHERE id = ?");
    $query->bind_param("i", $data->id);

    $run = $query->execute();       // execute the query

    if($run)        // check if sql query run succesfully in the database
    {
        echo json_encode(['status'=>'success', 'msg'=>'deleted successfully']);
        http_response_code(200);
    }
    else
    {
        echo json_encode(['status'=>'failed']);
        http_response_code(404);
    }
}
else
{
    // if id not passed
    echo json_encode(["status"=>"failed", "massage"=>"id not given"]);
    http_response_code(404);
}

?>