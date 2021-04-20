GNU nano 3.2                                 create.php                                 Modified

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

    //$data = json_decode(file_get_contents("php://input"));

    $item->RoomID = $_GET['RoomID'];
    $item->status = $_GET['status'];
        //echo $RoomID;
        //print_r($item);

    if($item->createRoom2()){
        echo 'Employee created successfully.';
    } else{
        echo 'Employee could not be created.';
    }
?>
