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

// Todo query
$result = $todo->read();

// Get row count
$num = $result->rowcount();

// Check if any todos
if ($num > 0) {
  $todos_arr = [];
  $todos_arr["data"] = [];

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $todo_item = [
      "id" => $id,
      "title" => $content,
      "isCompleted" => $isCompleted,
    ];

    // Push to "data"
    array_push($todos_arr["data"], $todo_item);
    // Note: use html_entity_decode($body) if you need to save html
  }

  // Convert to JSON & output
  echo json_encode($todos_arr);
} else {
  // No Todos
  echo json_encode(["message" => "No todos found"]);
}

?>
