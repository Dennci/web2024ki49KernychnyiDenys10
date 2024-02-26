<?php

$hostName = "localhost";
$dbUser = "id21921545_dennci";
$dbPassword = "Kozaciy922";
$dbName = "id21921545_site_testdb";
$connection = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$connection) {
    die("Something went wrong;");
}
try {
    $pdo = new PDO("mysql:host=$hostName;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
    die();
}
?>