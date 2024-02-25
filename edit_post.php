<?php
// Include your database connection code here
include('database.php');

// Get post ID from AJAX request
$post_id = $_POST['id'];
$new_text = $_POST['new_text'];

// Update post text
$query = "UPDATE posts SET text = :new_text WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
$stmt->bindParam(':new_text', $new_text, PDO::PARAM_STR);
$stmt->execute();
?>