<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../config/Database.php";
include_once "../models/Todo.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Insantiate Todo object
$todo = new Todo($db);

// Get ID
$todo->id = isset($_GET["id"]) ? $_GET["id"] : die();

// Get todo
$todo->read_single();

// Create array
$todo_arr = [
  "id" => $todo->id,
  "content" => $todo->content,
  "isCompleted" => $todo->isCompleted,
];

// Make JSON
print_r(json_encode($todo_arr));
