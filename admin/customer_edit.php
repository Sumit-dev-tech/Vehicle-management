<?php
include("conn.php");
include("session.php");
if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Fetch data from the database
  $query = "SELECT * FROM `tblmastercustomer` WHERE customerId = '" . $id . "'";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);
  // Fetch gender separately
  $gender = $data['gender'];
  // Add the gender to the data array
  $data['gender'] = $gender;

  // send data through json 
  echo json_encode($data);
}
if (isset($_POST['update_data'])){
    $id = $_POST['id'];
    $cName = $_POST['cname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $sql = "UPDATE `tblmastercustomer` SET `name`='".$cName."',`mobile`='".$mobile."',`email`='".$email."',`gender`='".$gender."',`dob`='".$dob."',`address`='".$address."',`city`='".$city."',`state`='".$state."',`country`='".$country."',`pincode`='".$pincode."' WHERE customerId='".$id."'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i><span class="text">Data Update Successfully</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        header("location: customer.php");
      }
      else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span class="text">Something Wrong</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        header("location: customer.php");
      }
    
}
?>