<?php

$hostName = "localhost";
$dbUser = "id21921545_dennci";
$dbPassword = "Kozaciyra#192";
$dbName = "id21921545_site_testdb";
$connection = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$connection) {
    die("Something went wrong;");
}
try {
    $pdo = new PDO("mysql:host=$hostName;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPassword);
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>