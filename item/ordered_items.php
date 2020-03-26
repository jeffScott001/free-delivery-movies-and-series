<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    require_once '../models/item.php';
    require_once '../config/Database.php';

    // Instatiate DB and connect to DB
    $database = new Database();
    $db = $database->connect();

    // Instantiate the user class
    $item = new Item($db);

    // Get the raw data
    $data = json_decode(file_get_contents("php://input"));
    foreach($data->items as $i) {
        $item->user_id = $data->user_id;
        $item->phone_number = $data->phone_number;
        $item->area = $data->area;
        $item->item_name = $i->title;
        $item->seasons = implode(", ",$i->seasons);
        $item->episodes = implode(", ",$i->episodes);
        $item->price = count($i->seasons)*30;
        $item->mpesa_code = $data->mpesa_code;
        $item->orderedItems();  
    }
    echo json_encode(['msg'=>'success']);



   