<?php

include('database.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_id = isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : null;


if ($user_id === null) {

    echo "User not logged in.";
    exit();
}

$text = $_POST['text'];


$query = "INSERT INTO posts (user_id, text) VALUES (:user_id, :text)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindParam(':text', $text, PDO::PARAM_STR);
$stmt->execute();
?>