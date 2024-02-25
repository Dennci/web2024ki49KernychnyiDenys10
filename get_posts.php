<?php
session_start();
include('database.php');

$user_id = isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : null;


if ($user_id === null) {

    exit();
}


$query = "SELECT * FROM posts WHERE user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT User_nickname FROM users WHERE Id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!empty($posts)) {

    foreach ($posts as $post) {
        echo '<div style="border: 1px solid #ccc; border-radius: 8px; padding: 10px; margin-bottom: 10px;">';
        echo '<div style="font-weight: bold; margin-bottom: 5px;">' . $user['User_nickname'] . '</div>';
        echo '<p>' . $post['text'] . '</p>';
        echo '<button class="edit-post" data-post-id="' . $post['Id'] . '">Edit</button>';
        echo '<button class="delete-post" data-post-id="' . $post['Id'] . '">Delete</button>';
        echo '</div>';
    }
} else {
    // No posts found
    echo '<p>No posts available.</p>';
}
?>
<style>
    .edit-post,
    .delete-post {
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 5px;
    }

    .delete-post {
        background-color: #dc3545;
    }
</style>