<?php 

$msg = new stdClass();
$msg->message = "No Action!";
$msg->status = -1;

$servername = "localhost";
$username = "root";
$password = "aaradhya@2003";
$dbname = "todo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $msg->message = "Successfully connected to ".$dbname;
    $msg->status = 1;

} 
catch(PDOException $e) {
    $msg->message = "Connection failed to ".$dbname. "<br>". $e->getMessage();
    $msg->status = 0;
}

?>