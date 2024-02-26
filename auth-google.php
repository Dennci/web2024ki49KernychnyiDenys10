<?php
            session_start();
            $email = $_POST["email"];

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE Email = '$email'";
            $result = mysqli_query($connection, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($user) {
                $_SESSION["USER_ID"] = $user['Id'];
                header("Location: index.php");
                 die();

            }else{
                die("Something went wrong");
            }

?>