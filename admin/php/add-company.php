<?php
@include "../../public/php/config.php";
$company = $_POST["company"];
$sql = "INSERT INTO company (`name`) VALUES ('$company')";
$result = mysqli_query($con, $sql);
header("location:../company");
