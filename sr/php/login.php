<?php
session_start();

if (isset($_POST['submit'])) {
    include "../../public/php/config.php";
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM sr WHERE `number`=$number AND `password`='{$password}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["sr_id"] = $row['id'];

        // Set session expiration time to 30 days (2592000 seconds)
        $expiration_time = time() + 2592000;
        setcookie(session_name(), session_id(), $expiration_time, "/");

        header("location:../dashboard");
        exit();
    } else {
        header("location:../dashboard");
        exit();
    }
} elseif (isset($_SESSION["sr_id"])) {
    // Check if the session has expired
    $expiration_time = time() + 2592000; // 30 days

    if ($expiration_time > $_COOKIE[session_name()]) {
        header("location:../dashboard");
        exit();
    } else {
        // Clear the session and redirect to login page
        session_unset();
        session_destroy();
        header("location:../");
        exit();
    }
}
