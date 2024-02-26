<?php
include('database.php');

$post_id = $_POST['id'];
$new_text = $_POST['new_text'];

$query = "UPDATE posts SET text = :new_text WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
$stmt->bindParam(':new_text', $new_text, PDO::PARAM_STR);
$stmt->execute();
?>