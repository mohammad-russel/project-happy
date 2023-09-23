
<?php
session_start();
unset($_SESSION["sr_id"]);
header("Location: ../");
