<?php
require_once "../../public/php/config.php"; // Include your database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data (use mysqli_real_escape_string to prevent SQL injection)
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $piece = mysqli_real_escape_string($con, $_POST["piece"]);
    $buy_rate = mysqli_real_escape_string($con, $_POST["buy_rate"]);
    $price = mysqli_real_escape_string($con, $_POST["price"]);
    $category_id = mysqli_real_escape_string($con, $_POST["category_id"]);
    $company_id = mysqli_real_escape_string($con, $_POST["company_id"]);
    $box_type = mysqli_real_escape_string($con, $_POST["box_type"]);
    $stock = mysqli_real_escape_string($con, $_POST["stock"]);

    // Handle file upload (image)
    $target_dir = "../../public/image/product/"; // Specify your upload directory
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "Sorry, the uploaded file is not an image.";
    } else {
        // Check file size (adjust the file size limit as needed)
        if ($_FILES["image"]["size"] > 5000000) { // 5 MB
            echo "Sorry, the uploaded file is too large.";
        } else {
            // Allow certain file formats (you can add more if needed)
            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            if (in_array($imageFileType, $allowedFormats)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // File uploaded successfully
                    // Only store the file name in the database
                    $imageFileName = basename($_FILES["image"]["name"]);

                    // Insert data into the database (use prepared statements to prevent SQL injection)
                    $sql = "INSERT INTO product (`name`, piece, buy_rate, price, category_id, company_id, box_type, stock, `image`)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "ssddiiiss", $name, $piece, $buy_rate, $price, $category_id, $company_id, $box_type, $stock, $imageFileName);

                    if (mysqli_stmt_execute($stmt)) {
                        header("Location: ../product"); // Redirect to a success page
                        exit();
                    } else {
                        echo "Error: " . mysqli_stmt_error($stmt);
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            }
        }
    }
}
