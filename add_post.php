<?php
// Include your database connection code here
include('database.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Assuming you have a session mechanism to get the user's ID
$user_id = isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : null;

// Check if user is logged in
if ($user_id === null) {
    // Handle the case where the user is not logged in
    echo "User not logged in.";
    exit();
}

$text = $_POST['text'];

// Insert new post
$query = "INSERT INTO posts (user_id, text) VALUES (:user_id, :text)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindParam(':text', $text, PDO::PARAM_STR);
$stmt->execute();
?>