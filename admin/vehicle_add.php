<?php
include("header.php");
// if (isset($_FILES['inputFile'])) {
//     $targetDir = 'Picture/';
//     $targetFile = $targetDir . basename($_FILES['inputFile']['name']);
    
//     if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
//       echo $targetFile;
//     } else {
//       echo 'Failed to upload image.';
//     }
//   }
  
if (isset($_POST['submit_data'])) {
    if ($_FILES['inputFile']['error'] == 0) {
        $tmpFile = $_FILES['inputFile']['tmp_name'];
        $fileName = $_FILES['inputFile']['name'];
        $filePath =  "Picture/";
        if (move_uploaded_file($tmpFile, $filePath . $fileName)) {
            echo "upload";
        } else {
            echo '<script> window.alert ("Pic Not Upload"); </script>';
        }
    }
    $modalNo = $_POST['modalNo'];
    $chassisNo = $_POST['chassisNo'];
    $variant = $_POST['variant'];
    $color = $_POST['color'];
    $imagePath = $_FILES['inputFile']['name'];
    $price = $_POST['price'];
    $query = "INSERT INTO `tblmastervehicle`(`modalNo`, `chassisNo`, `variant`, `color`, `imagePath`, `price`) VALUES ('".$modalNo."','".$chassisNo."','".$variant."','".$color."','".$imagePath."','".$price."')";
    $run = mysqli_query($conn, $query);
    if ($run) {
        $_SESSION['message']= '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i><span class="text">Data Add Successfully</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        header("location: vehicle.php");
    } else {
        $_SESSION['message']= '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span class="text">Something Wrong</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        header("location: vehicle.php");
    }
}
