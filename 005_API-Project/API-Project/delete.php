<?php

header('Access-Control-Allow-Origin:*');

header('Content-Type:application/json; charset=UTF-8');

header('Access-Control-Allow-Methods: POST');

header('Access-Control-Max-Age: 3600');

header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers: Authorization, X- Requested-With');

include_once __DIR__ . '../config/database.php';

include_once __DIR__ . '../class/employees.php';

$dataBase = new Database();

$db = $dataBase->connect();

$item = new Eployee($db);

$data = json_decode(file_get_contents('details.json'));

$item->id = $data->id;

if($item->deleteEmployee()) {
    $successfuly = ['Message' => 'Employee Delete'];

    echo json_encode($successfuly);
    
}else {
    $error = ['Message' => 'Sorry, Not Be Delete'];

    echo json_encode($error);
}

?>