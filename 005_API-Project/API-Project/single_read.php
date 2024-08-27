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

$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getSingleEmployee();

if($item->name != null) {
    $list = array(
        "id" => $item->id,
        "name" => $item->name,
        "email" => $item->email,
        "age" => $item->age,
        "designation" => $item->designation,
        "created" => $item->created
    );

    http_response_code(200);

    echo json_encode($list);
}else {
    http_response_code(404);

    $error = ['Message' => 'Employee Not Found'];

    echo json_encode($error);
}

?>