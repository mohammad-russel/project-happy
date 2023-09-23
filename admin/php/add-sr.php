<?php
@include "../../public/php/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Get values from the form
    $name = $_POST["name"];
    $number = $_POST["number"];
    $image = $_POST["image"];
    $deller_id = $_POST["deller_id"];
    $company_id = $_POST["company_id"];
    $password = $_POST["password"];
    $activity = $_POST["activity"];
    $route_id = $_POST["route_id"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO sr (`name`, `number`, `image`, deller_id, company_id, `password`, activity, route_id)
            VALUES ('$name', '$number', '$image', '$deller_id', '$company_id', '$password', '$activity', '$route_id')";

    if ($con->query($sql) === TRUE) {
        echo "Company added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
