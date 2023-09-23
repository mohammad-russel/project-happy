<?php
@include "../../public/php/config.php";
$id = $_GET['id'];
$sql = "UPDATE retailer SET pay= 1 WHERE activer_id = $id AND pay=0";
$result = mysqli_query($con, $sql);
