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

$item->name = $data->name;

$item->email = $data->email;

$item->age = $data->age;

$item->designation = $data->designation;

if($item->createEmployee()) {

    $successfully = ['Message' => 'Employee Created Successfully'];

    echo json_encode($successfully);
}else {
    $error = ['Message' => 'Employee Could Not Be Created'];

    echo json_encode($error);

}





?>