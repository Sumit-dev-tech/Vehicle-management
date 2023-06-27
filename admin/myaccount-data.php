<?php
include('conn.php');
include('session.php');
// Fetch user data In form 
if (isset($_POST['profileId'])) {
  $profileId = $_POST['profileId'];
  $sql = "SELECT * FROM `tblmasteradmin` WHERE adminId = '" .  $profileId . "'";
  $run = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($run);
  echo json_encode($data);
}
// Update User Data

?>