<?php
include("conn.php");
include("session.php");
if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Fetch data from the database
  $query = "SELECT * FROM tblmastervehicle WHERE vehicleId = '" . $id . "'";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);
  // send data through json 
  echo json_encode($data);
}
// if(isset($_POST['update_data'])){
//   $id = $_POST['id'];
//   $modalNo = $_POST['modalNo'];
//   $chassisNo = $_POST['chassisNo'];
//   $variant = $_POST['variant'];
//   $color = $_POST['color'];
//   $imagePath = $_FILES['inputFile']['name'];
//   $price = $_POST['price'];
//   $query = "UPDATE `tblmastervehicle` SET `modalNo`='".$modalNo."',`chassisNo`='".$chassisNo."',`variant`='". $variant ."',`color`='".$color."',`imagePath`='".$imagePath."',`price`='".$price."' WHERE vehicleId='".$id."'";
//   $run = mysqli_query($conn, $query);
//   if ($run) {
//     echo '<script>alert("Your Data Update Successfully");</script>';
//     header("location: vehicle.php");
// } else {
//     echo '<script> alert("Something Wrong");</script>';
//     header("location: vehicle.php");
// }

// }
if (isset($_POST['update_data'])) {
  $id = $_POST['id'];
  $modalNo = $_POST['modalNumber'];
  $chassisNo = $_POST['chassisNumber'];
  $variant = $_POST['variant'];
  $color = $_POST['color'];
  $price = $_POST['price'];

  // Check if a new image file is uploaded
  if ($_FILES['inputFile']['error'] === UPLOAD_ERR_OK) {
    $imagePath = $_FILES['inputFile']['name'];

    // Move the uploaded file to the desired location
    $uploadDir = 'Picture/';
    $uploadPath = $uploadDir . basename($imagePath);
    if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadPath)) {
      // File upload successful, update the imagePath in the database
      $query = "UPDATE `tblmastervehicle` SET `modalNo`='" . $modalNo . "', `chassisNo`='" . $chassisNo . "', `variant`='" . $variant . "', `color`='" . $color . "', `imagePath`='" . $imagePath . "', `price`='" . $price . "' WHERE vehicleId='" . $id . "'";

      $run = mysqli_query($conn, $query);

      if ($run) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i><span class="text">Data Update Successfully</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        header("location: vehicle.php");
      }
      else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span class="text">Something Wrong</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        header("location: vehicle.php");
      }
    }
    else {
      echo '<script>alert("Failed to move the uploaded file.");</script>';
      header("location: vehicle.php");
    }
  }
  else {
    // No new image file uploaded, update other fields except imagePath
    $query = "UPDATE `tblmastervehicle` SET `modalNo`='" . $modalNo . "', `chassisNo`='" . $chassisNo . "', `variant`='" . $variant . "', `color`='" . $color . "', `price`='" . $price . "' WHERE vehicleId='" . $id . "'";

    $run = mysqli_query($conn, $query);

    if ($run) {
      $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill"></i><span class="text">Data Update Successfully</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
      header("location: vehicle.php");
    }
    else {
      $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-circle-fill"></i>
      <span class="text">Something Wrong</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
      header("location: vehicle.php");
    }
  }
}

?>