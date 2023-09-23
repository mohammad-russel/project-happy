<?php
session_start(); // Start the session

@include "../../public/php/config.php";

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM retail_adder WHERE `number`='$number' AND `password`='$password'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        // Successful login
        $_SESSION["user_id"] = $row['id']; // Store username in session
        header("location:../");
    } else {
        header("location:login");
    }
}

$con->close();
