<?php
 require ("header.php");
 if (isset($_POST['submit_data'])) {
    $cName = $_POST['cname'];
    // $countryCode = $_POST['countrycode'];
    
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
       
     $query = "INSERT INTO `tblmastercustomer`(`name`,`mobile`, `email`, `gender`, `dob`, `address`, `city`, `state`, `country`, `pincode`) VALUES ('".$cName."','".$mobile."','".$email."','".$gender."','".$dob."','".$address."','".$city."','".$state."','".$country."','".$pincode."')";
    $run = mysqli_query($conn, $query);
    if ($run) {
        $_SESSION['message']= '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i><span class="text">Data Add Successfully</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        header("location: customer.php");
    } else {
        $_SESSION['message']= '<div class="alert alert-warning alert-dismissible fade show" role="alert">
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