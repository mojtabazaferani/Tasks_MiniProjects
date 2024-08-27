<?php

header('Access-Control-Allow-Origin:*');

header('Content-Type:application/json; charset=UTF-8');

include_once __DIR__ . '../config/database.php';

include_once __DIR__ . '../class/employees.php';

$database = new Database();

$db = $database->connect();

$items = new Eployee($db);

$stmt = $items->getEmployees();

$itemCount = $stmt->rowCount();

if($itemCount > 0) {
    $employeeArr = array();

    $employeeArr['body'] = array();

    $employeeArr['itemCount'] = $itemCount;

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $e = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "age" => $age,
            "designation" => $designation,
            "created" => $created
        );

        array_push($employeeArr['body'], $e);
    }

    echo json_encode($employeeArr);

}else {
    http_response_code(404);

    $error = ['Message' => 'No Record Found'];

    echo json_encode($error);

}

?>