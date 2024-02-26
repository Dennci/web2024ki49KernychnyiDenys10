<?php
// Include your database connection code here
include('database.php');

// Get post ID from AJAX request
$post_id = $_POST['id'];

// Delete post
$query = "DELETE FROM posts WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
$stmt->execute();
?>