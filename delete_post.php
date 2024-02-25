<?php
include('database.php');
$post_id = $_POST['id'];
$query = "DELETE FROM posts WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
$stmt->execute();
?>