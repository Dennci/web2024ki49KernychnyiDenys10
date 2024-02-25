<?php
session_start();
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE Email='$userEmail' AND Password='$password'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        if ($result->num_rows == 1) {

            $_SESSION['USER_ID'] = $user['Id'];


            // Close the database connection
            mysqli_close($connection);

            // Send a success response
            echo "success";
        } else {
            // Send a fail response
            echo "fail";
        }
    } else {
        // Send an error response
        echo "Error: " . mysqli_error($connection);
    }
} else {
    // Send an error response if the request method is not POST
    echo "Invalid request method";
}
?>