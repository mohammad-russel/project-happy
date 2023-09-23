<?php
@include "../../public/php/config.php";
$category_name = $_POST["category"];
$sql = "INSERT INTO category (`name`) VALUES ('$category_name')";
$result = mysqli_query($con, $sql);
header("location:../category");
