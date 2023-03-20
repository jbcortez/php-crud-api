<?php
class Todo
{
  // DB stuff
  private $conn;
  private $table = "todos";

  // Todo properties
  public $id;
  public $content;
  public $isCompleted = false;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // GET Todos
  public function read()
  {
    // Create query
    $query = "SELECT * FROM {$this->table}";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // GET single todo
  public function read_single()
  {
    // Create query
    $query = "SELECT * FROM {$this->table} WHERE id = ?";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->content = $row["content"];
    $this->isCompleted = $row["isCompleted"];
  }

  // Create Todo
  public function create()
  {
    // Create query
    $query = "INSERT INTO {$this->table} SET content = :content";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->content = htmlspecialchars(strip_tags($this->content));

    // Bind data
    $stmt->bindParam(":content", $this->content);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s");

    return false;
  }

  // Update Todo
  public function update()
  {
    // Create query
    $query = "UPDATE {$this->table} SET content = :content, isCompleted = :isCompleted WHERE id = :id";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->content = htmlspecialchars(strip_tags($this->content));
    $this->isCompleted = htmlspecialchars(strip_tags($this->isCompleted));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(":content", $this->content);
    $stmt->bindParam(":isCompleted", $this->isCompleted);
    $stmt->bindParam(":id", $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s");

    return false;
  }

  // Delete Todo
  public function delete()
  {
    // Create query
    $query = "DELETE FROM {$this->table} WHERE id = :id";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(":id", $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s");

    return false;
  }
}
