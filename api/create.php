<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header(
  "Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With"
);

include_once "../config/Database.php";
include_once "../models/Todo.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Insantiate Todo object
$todo = new Todo($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$todo->content = $data->content;

if ($todo->create()) {
  echo json_encode(["message" => "Todo created"]);
} else {
  echo json_encode(["message" => "Todo not created"]);
}
