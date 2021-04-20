<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/db.php';
include_once 'room.php';
$database = new db();

$db = $database->connect();

        //authentication();
    $items = new room($db);

    $stmt = $items->getRooms();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){

        $roomArr = array();
        $roomArr["body"] = array();
        $roomArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "RoomID" => $RoomID,
                "status" => $status,
            );
            array_push($roomArr["body"], $e);
        }
        echo json_encode($roomArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>