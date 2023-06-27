<?php
include('conn.php');
include('session.php');
if (isset($_POST['imageId'])) {
  $imageId = $_POST['imageId'];
  $query = "SELECT * FROM `tblmasteradmin` WHERE adminId = '" . $imageId . "'";
  $result = mysqli_query($conn, $query);
  $responce = mysqli_fetch_assoc($result);
  echo json_encode($responce);
}
if (isset($_POST['update-image'])) {

  $ProfileId = $_POST['profileId'];
  if ($_FILES['profileImg']['error'] === UPLOAD_ERR_OK) {
    $imagePath = $_FILES['profileImg']['name'];
    $imageSize = $_FILES['profileImg']['size'];
    $imageType = $_FILES['profileImg']['type'];

    // Check if the image size is within the desired limit (e.g., 2MB)
    $maxSize = 2 * 1024 * 1024; // 2MB
    if ($imageSize <= $maxSize) {
      // Check if the image type is JPEG, PNG, or GIF
      $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      if (in_array($imageType, $allowedTypes)) {
        $uploadDir = 'Picture/';
        $uploadPath = $uploadDir . basename($imagePath);
        if (move_uploaded_file($_FILES['profileImg']['tmp_name'], $uploadPath)) {

          $sql = "UPDATE `tblmasteradmin` SET `profileimg`='" . $imagePath . "' WHERE `adminId` = '" . $ProfileId . "'";
          $run = mysqli_query($conn, $sql);
          if ($run) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill"></i><span class="text">Image Update Successfully</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            header("location: myaccount.php");
            exit;
          }
          else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-circle-fill"></i>
      <span class="text">Something Wrong</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
            header("location: myaccount.php");
            exit;
          }
        }
        else {
          $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-circle-fill"></i>
      <span class="text">Failed to upload image</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>';
          header("location: myaccount.php");
          exit; // Added exit to stop further execution
        }
      }
      else {

        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span class="text">Only JPEG, PNG, and GIF images are allowed</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        header("location: myaccount.php");
        exit; // Added exit to stop further execution
      }

    }
    else {
      $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="bi bi-exclamation-circle-fill"></i>
    <span class="text">Image size exceeds the limit (2MB)</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
      header("location: myaccount.php");
      exit; // Added exit to stop further execution
    }
  }
  else {
    $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span class="text">Failed to upload image</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    header("location: myaccount.php");
    exit; // Added exit to stop further execution
  }

}
?>