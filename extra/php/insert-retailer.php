<?php
session_start();
$adder_id = $_SESSION["user_id"];
@include "../../public/php/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $shopName = mysqli_real_escape_string($con, $_POST['shop']);
    $bazar = mysqli_real_escape_string($con, $_POST['bazar']);
    $area = mysqli_real_escape_string($con, $_POST['area']);

    // Check if the number already exists in the database
    $numberCheckQuery = "SELECT * FROM retailer WHERE `number` = '$number'";
    $numberCheckResult = mysqli_query($con, $numberCheckQuery);

    if (mysqli_num_rows($numberCheckResult) > 0) {
        header("localhost:retailer");
        echo "Already Exist  ";
        // echo "  <a href='retailer'>Go Back</a>";
    } else {
        $uniqe_id = uniqid();
        $qrCode = urlencode($uniqe_id); /*online*/
        // $qrCode = urlencode('/dokan/version-2/sr/page/product.php?retailer_num=' . $uniqe_id); /* local */
        $qrCodeImagePath = '../public/image/qrcode/qrcode' . $uniqe_id . '.png';
        $qrname = 'qrcode' . $uniqe_id . '.png';
        $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $qrCode;
        $qrCodeData = file_get_contents($qrCodeUrl);
        file_put_contents($qrCodeImagePath, $qrCodeData);
        // ----------------------------------
        if (!empty($_FILES['shop-image']['name'])) {
            $shopImage = $_FILES['shop-image']['name'];
            $shopImageTmp = $_FILES['shop-image']['tmp_name'];
            $shopImageDestination = "../public/image/shop/" . $shopImage;

            if (move_uploaded_file($shopImageTmp, $shopImageDestination)) {
                // File moved successfully
            } else {
                // Error moving file
            }
        } else {
            $shopImage = "";
        }
        if (!empty($_FILES['retailer-image']['name'])) {
            $retailerImage = $_FILES['retailer-image']['name'];
            $retailerImageTmp = $_FILES['retailer-image']['tmp_name'];
            $retailerImageDestination = "../../public/image/retailer/" . $retailerImage;

            if (move_uploaded_file($retailerImageTmp, $retailerImageDestination)) {
                // File moved successfully
            } else {
                // Error moving file
            }
        } else {
            $retailerImage = "";
        }


        $sql = "INSERT INTO retailer (`name`, shop_name, bazar_id, area, shop_image, retailer_image, `number`,uniqe_id,qrcode,qrstate,activer_id,`password`)
                VALUES ('$name', '$shopName', '$bazar', '$area', '$shopImage', '$retailerImage', '$number','$uniqe_id','$qrname','new','$adder_id',123)";

        if (mysqli_query($con, $sql)) {
            echo "Record added successfully.";
            mysqli_close($con);
            header("Location:../"); // Redirect after successful insertion
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}
mysqli_close($con);
header("localhost:retailer");
