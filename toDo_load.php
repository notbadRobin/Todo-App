<?php 

include 'toDo_config.php';

$msg = new stdClass();
$msg->message = "No Action!";
$msg->status = -1;

try {
    $disD = $conn->prepare ("SELECT tid, tname, tdesc, taction FROM list");

    $disD->execute();
  
    $resp = $disD->setFetchMode(PDO::FETCH_ASSOC);
  
    $msg->message = json_encode($disD->fetchAll());
    $msg->status = 1;
    $conn = null;

} catch (PDOException $e) {
    $msg->message = "Error! Load Failed due to Reason: ". $sql . "\ln" . $e->getMessage();
    $msg->status = 0;
    $conn = null;
}

echo $msg->message;

?>