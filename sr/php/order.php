<?php
@include "../../public/php/config.php";
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data sent via AJAX
    date_default_timezone_set('Asia/Dhaka');
    $today = date("y-m-d|h:m:s");
    $product_id = $_POST['product_id'];
    $retailer_id = $_POST['retailer_id'];
    $piece = $_POST['piece'];
    $price = $_POST['price'];
    $total_amount = $_POST['total_amount'];
    $sr_total_amount = $_POST['sr_total_amount'];
    $sr_price = $_POST['sr_price'];
    $order_time = $today;
    $status = $_POST['status'];
    $sr_id = $_POST['sr_id'];
    $deller_id = $_POST['deller_id'];

    // Prepare and execute the SQL query (replace with your actual table and query)
    $sql = "INSERT INTO orders (product_id, retailer_id, piece, price, total_amount, sr_total_amount, sr_price, order_time, `status`, sr_id, deller_id) VALUES ('$product_id', '$retailer_id', '$piece', '$price', '$total_amount', '$sr_total_amount', '$sr_price', '$order_time', '$status', '$sr_id', '$deller_id')";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($con)); // Print the error message
    }
} else {
    echo "Invalid request method!";
}
