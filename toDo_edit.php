<?php 

include 'toDo_config.php';

$msg = new stdClass();
$msg->message = "No Action!";
$msg->status = -1;

$response = new stdClass();
$response -> edId = $_POST["editId"];
$response -> edname = $_POST["editName"];

try {
  $upD = "UPDATE list SET tname='$response->edname' WHERE tid=$response->edId";

  $stmt = $conn->prepare($upD);

  $stmt->execute();

  $msg->status = 1;
  $conn = null;
} 
catch(PDOException $e) {

  $msg->message = "Error! Edit Failed due to Reason: ". $sql . "\ln" . $e->getMessage();
  $msg->status = 0;
  $conn = null;

}

echo $msg->message;

?> 