<?php
include 'src/Connection.php';   // include Connection file

// Headers
header('Access-control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorisation,X-Requested-With');

// Recive data from api url
$data = json_decode(file_get_contents("php://input"));

//table name
$table = 'student';
$student_name = "";
$student_roll = "";
$student_class = "";

// Cheak if id given or not
function fetchAllData(){
    global $data, $Conn, $table, $student_name, $student_roll, $student_class;  // global variables
    if(isset($data->id))
    {
        /* Generate a query to fetch pre existing data from the
        database correspondin to the user/student id */
        $getQuery = $Conn->prepare("SELECT * FROM $table WHERE id=?");
        $getQuery->bind_param("i", $data->id);

        if($getQuery->execute())     // run the query into the database
        {
            // fetch all student data from the database
            $students = $getQuery->get_result()->fetch_all(MYSQLI_ASSOC);

            if($students != null){
                // store fetched data into variables
                $student_name = $students[0]['sname'];
                $student_roll = $students[0]['roll'];
                $student_class = $students[0]['class'];

                return 1;
            }
            return 0;
        }
        return 0;
    }
    return 0;
}

// check if any data fetched fromm the database corrosponding to given id
if(fetchAllData()){
    // empty array to store dinamicary generate query chunks
    $insertQueryArr = array();
    $insertValues = array();

    /* checking for if user passed some value, its not empty
    and is the passed value allready exist into the database */
    if(isset($data->sname) && $data->sname != '')
    {
        if($data->sname != $student_name)
        {
            array_push($insertQueryArr, "sname=?");
            $sname = $data->sname;
            array_push($insertValues, '$sname');
        }
    }
    if(isset($data->roll) && $data->roll != '')
    {
        if($data->roll != $student_roll)
        {
            array_push($insertQueryArr, "roll=?");
            $sroll = $data->roll;
            array_push($insertValues, '$sroll');
        }
    }
    if(isset($data->class) && $data->class != '')
    {
        if($data->class != $student_class)
        {
            array_push($insertQueryArr, "class=?");
            $sclass = $data->class;
            array_push($insertValues, '$sclass');
        }
    }

    // check if there anything to insert
    if(!empty($insertValues))
    {
        // Generate sql query to update data into the database dinamically
        $updateQuery = "UPDATE $table SET ";      // starting part of query
        
        // cout length of update_datas array
        $arr_len = count($insertQueryArr);

        // generate update query dinamicaly
        for($i = 0; $i < $arr_len; $i++)
        {
            $updateQuery .= $insertQueryArr[$i];
            if($i < $arr_len - 1)
            {
                $updateQuery .= ",";
            }
        }
        $updateQuery .= " WHERE id=?;";        // final part of update query

        // echo $updateQuery;    // printing the update query

        $query = $Conn->prepare($updateQuery);      // prepare the update query

        // bind parameters dinamicaly
        $paramCount = "";
        $bindParam = '$query->bind_param("#paramtypes", ';

        for($i = 0; $i < count($insertValues); $i++)
        {
            $paramCount .= "s";
            $bindParam .= $insertValues[$i];

            if($i < (count($insertValues) - 1)){
                $bindParam .= ',';
            }
        }

        $id = $data->id;

        $bindParam .= ', $id);';

        $bindParam = str_replace("#paramtypes", $paramCount.'i', $bindParam);

        eval($bindParam);       // evaluvating bind_param commnad

        $run = $query->execute();   // execute update command to the database

        if($run)        // check if sql query run succesfully in the database
        {
            echo json_encode(['status'=>'success', 'msg'=>'updated successfully']); // success message
            http_response_code(200);                // return status code 200 success
        }
        else
        {
            // if its unable to update data to the database
            echo json_encode(['status'=>'failed']);     // showing error message
            http_response_code(404);                    // return 404
        }
    }
    else
    {
        echo json_encode(["massege"=>"nothing to change"]);     // print message nothing to change
        http_response_code(200);
    }
}
else
{
    /* if id not passed by user, in this case api is able
    to understand which user data user want to update */
    echo json_encode(["status"=>"failed", "massage"=>"id not given"]);      // show error message
    http_response_code(404);                            // return status code 404 not found
}

?>