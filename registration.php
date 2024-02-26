<?php
require_once "database.php";

$email = $_POST['email'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];
$user_nickname = $_POST['user_nickname'];

echo $user_nickname;

$sql = "INSERT INTO users (User_nickname, Email, Password) VALUES ( ?, ?, ? )";
$stmt = mysqli_stmt_init($connection);
$prepareStmt = mysqli_stmt_prepare($stmt,$sql);
if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"sss",$user_nickname, $email, $password);
    mysqli_stmt_execute($stmt);
    echo "<div class='alert alert-success'>Congratulation you are registered successfully.</div>";
}
else{
    die("Something went wrong");
}

?>