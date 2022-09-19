<?php

$host = "127.0.0.1";            // ip address or url of database server
$user_name = "root";            // database user name
$password = "";                 // database user password
$database_name = "students";    // database name

$Conn = mysqli_connect($host, $user_name, $password, $database_name);  // connect to the database

if(!$Conn)    // check if database connects successfully
{
    echo "Unable To Establish Connection with database";
    echo mysqli_connect_error();    // get the connection error
}

?>