<?php 
  include('conn.php');
  include('session.php');
  if(isset($_POST['imageId'])){
    $imageId = $_POST['imageId'];
    $query = "SELECT * FROM `tblmasteradmin` WHERE adminId = '" .  $imageId . "'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
  }
?>