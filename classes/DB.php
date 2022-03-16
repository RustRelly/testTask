<?php
class DB{

  private $conn;
  public $count = 0;

  public function dbConnect() {
    $this->conn = new mysqli("localhost", "root", "", "postdb");
    $conn = $this->conn;
    if(!$conn)
      print("Ошибка подключения к базе данных" . $conn->connect_error());
    else
      $conn->set_charset("utf8");
    return $conn;
  }

public function insertData($sql, $isCount) {
  if ($this->conn->query($sql)) {
    if($isCount)
      $this->count++;
  }
 }

 public function selectData($sql) {
   $result = $this->conn->query($sql);
   if($result->num_rows > 0)
    return $result;
   else
    return NULL;
  }

 public function __destruct() {
   $this->conn->close();
 }
}
?>
