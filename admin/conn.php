<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost", "root", "", "vehicle_management");
if (!($conn)) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo ("Connected Successfully");
}
// $sql = "SELECT * FROM `tblmasteradmin` Where id= '2'";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// echo $row;

// $conn = new mysqli("localhost", "root", "", "vehicle_management");
// if($conn->connect_error){
//     die ("connection fileld");
// }
//  $sql ="SELECT * FROM `tblmasteradmin`";
//  $query= $conn->query($sql);
//  $row = $query->fetch_assoc();
//  print_r($row);
 