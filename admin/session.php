<?php
session_start();
if (!isset($_SESSION['user_data'])) {
    header("location: index.php");
} else {

    $userdata = json_decode($_SESSION['user_data']);
} 
?>