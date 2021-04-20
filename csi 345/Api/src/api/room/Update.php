<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization$");

include_once '../../config/db.php';
include_once 'room.php';

$database = new db();
$db = $database->connect();

$item = new Room($db);
// UPDATE

$item->RoomID = $_GET['RoomID'];
$item->status = $_GET['status'];  

if($item->updateRoom)){
    echo json_encode("Employee data updated.");
} else{
    echo json_encode("Data could not be updated");
}
?>
