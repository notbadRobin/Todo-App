<?php

$msg = new stdClass();
$msg->message = "No Action!";
$msg->status = -1;

$delResp = new stdClass();
$delResp -> dbId = $_POST["delId"];

$servername = "localhost";
$username = "root";
$password = "aaradhya@2003";
$dbname = "todo";
$conn = null;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $delD = $conn->prepare("DELETE FROM list WHERE tid = $delResp->dbId");
    
    $delD->execute();

    $msg->message = "Item with id:-".$delResp->dbId." has been deleted!";
    $msg->status = 1;
    $conn = null;
} 
catch(PDOException $e) {    
    $msg->message = "Error! Delete Failed due to Reason: ". $sql . "\ln" . $e->getMessage();
    $msg->status = 0;
    $conn = null;
}

echo json_encode($msg);

?>