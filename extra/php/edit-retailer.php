<?php
@include "../../public/php/config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $shopName = mysqli_real_escape_string($con, $_POST['shop']);
    $upazila = mysqli_real_escape_string($con, $_POST['upazila']);
    $union = mysqli_real_escape_string($con, $_POST['union']);
    $bazar = mysqli_real_escape_string($con, $_POST['bazar']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $sql1 = "SELECT * FROM retailer WHERE  id = $id";
    $result1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($result1);
    if (!empty($_FILES['shop-image']['name'])) {
        $shopImage = $_FILES['shop-image']['name'];
        $shopImageTmp = $_FILES['shop-image']['tmp_name'];
        $shopImageDestination = "../../public/image/shop/" . $shopImage;

        if (move_uploaded_file($shopImageTmp, $shopImageDestination)) {
            // File moved successfully
        } else {
            // Error moving file
        }
    } else {
        $shopImage = $row['shop_image'];
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
        $retailerImage = $row['retailer_image'];
    }

    $sql = "UPDATE retailer 
            SET `name` = '$name', 
                shop_name = '$shopName', 
                bazar_id = '$bazar', 
                area = '$area', 
                shop_image = '$shopImage', 
                retailer_image = '$retailerImage' ,
                `number` = '$number'
            WHERE id = '$id' ";

    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
header("location:../");
