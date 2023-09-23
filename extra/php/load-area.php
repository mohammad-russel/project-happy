<?php
@include "../../public/php/config.php";
if (isset($_POST['upazila'])) {
    $upazila = $_POST['upazila'];
    $sql = "SELECT * FROM unions WHERE upazila_id = $upazila";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)) {
        echo '<option value="">Select union</option>';
        while ($row = $result->fetch_assoc()) {
            $unionName = $row['union_name'];
            $unionId = $row['id'];
            echo "<option value=\"$unionId\">$unionName</option>";
        }
    }
} elseif (isset($_POST['union'])) {
    $union = $_POST['union'];
    $sql = "SELECT * FROM bazar WHERE union_id = $union";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)) {
        echo '<option value="">Select Bazar</option>';
        while ($row = $result->fetch_assoc()) {
            $bazarName = $row['bazar_name'];
            $bazarId = $row['id'];
            echo "<option value=\"$bazarId\">$bazarName</option>";
        }
    }
} else {
    // ----------
    $sql = "SELECT * FROM upazila";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)) {
        echo '<option value="">Select Upazila</option>';

        while ($row = $result->fetch_assoc()) {
            $upazilaName = $row['upazila_name'];
            $upazilaId = $row['id'];
            echo "<option value=\"$upazilaId\">$upazilaName</option>";
        }
    }
}
