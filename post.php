<?php
include 'src/Connection.php';   // include Connection file

// Headers
header('Access-control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorisation,X-Requested-With');

// Recive user input data from api's url parameter
$data = json_decode(file_get_contents("php://input"));

// check if sname(Student's Name) passed by the user
if(!isset($data->sname) || $data->sname == null)
{
    // if student name not passed
    echo json_encode(['status'=>'failed', 'msg'=>'sname not provided']);    // show josn encoded error message
    http_response_code(404);                        // return status code 404 not found
}
else
{
    // prepare sql query to insert data into the database
    $query = $Conn->prepare("INSERT INTO student(sname, roll, class) VALUES(?, ?, ?)");
    $query->bind_param("sss", $data->sname, $data->roll, $data->class);

    $run = $query->execute();       // execute the query

    if($run)        // check if sql query run succesfully in the database
    {
        // show json encoded success message
        echo json_encode(['status'=>'success', 'msg'=>'data added']);
        http_response_code(201);              // return status code 201 Data added to the database
    }
    else
    {
        echo json_encode(['status'=>'failed']);     // show josn encoded error message
        http_response_code(404);                    // return satus code 404 not found
    }
}

?>