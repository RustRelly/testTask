<?php

include 'classes/DB.php';
include 'classes/jsonFile.php';

$db = new DB();
$conn = $db->dbConnect();

if(!$conn)
  exit();

$postJson = new jsonFile();
$commJson = new jsonFile();

$post_data = $postJson->readFile("https://jsonplaceholder.typicode.com/posts");
$comm_data = $postJson->readFile("https://jsonplaceholder.typicode.com/comments");

if($comm_data < 0 || $post_data < 0)
  exit();

foreach($post_data as $elem) {
  $sql = 'INSERT INTO users SET userId = ' . $elem->userId;
  $db->insertData($sql, false);
  $sql = 'INSERT INTO posts SET postId = ' . $elem->id . ', title = "' . $elem->title . '", body = "' .
  $elem->body . '", userId = ' . $elem->userId;
  $db->insertData($sql, true);
}

$counter_posts = $db->count;
$db->count = 0;

foreach($comm_data as $elem) {
  $sql = 'INSERT INTO comments SET commId = ' . $elem->id . ', email = "' . $elem->email .
  '", name = "' . $elem->name . '", body = "' . $elem->body . '", postId = ' . $elem->postId;
  $db->insertData($sql, true);
}

$counter_comm = $db->count;

echo "Загружено $counter_posts записей и $counter_comm комментариев"
?>
