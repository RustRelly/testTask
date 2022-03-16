<?php
include '../classes/DB.php';
include '../html/startPage.html';

$searchString = $_POST["textBoxSearch"];
if(strlen($searchString) == 0) {
  echo "Строка пуста";
  exit();
}
if(strlen($searchString) < 3) {
  echo "Введитее строку от трех символов";
  exit();
}

$db = new DB();
$conn = $db->dbConnect();

$sql = "SELECT posts.title, comments.body FROM comments INNER JOIN posts ON (comments.body LIKE '%" . $searchString .
  "%' AND posts.postId = comments.postId);";

$selectArr = $db->selectData($sql);

if($selectArr != NULL){
  echo "Найдено $selectArr->num_rows результата(ов)";
  echo "<table rules=\"rows\" cellpadding=\"4\"><tr><th>Заголовок записи</th><th>Комментарии, содержащие искомую строку</th></tr>";
  while($row = $selectArr->fetch_assoc()) {
      echo "<tr><td>".$row["title"]."</td><td>".$row["body"]."</td></tr>";
  }
  echo "</table>";
}
else
  echo "По запросу ничего не найдено";
?>
