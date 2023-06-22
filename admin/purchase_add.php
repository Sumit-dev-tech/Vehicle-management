<?php
 include('header.php');
 if(isset($_POST['submit_data'])){
    $customerId = $_POST['customerId'];
    $vehicleId = $_POST['vehicleId'];
    $numberOfVehicle = $_POST['numberOfVehicle'];
    $totalAmount = $_POST['totalAmount'];
    $purchaseDate = $_POST['purchaseDate'];
    $sql = "INSERT INTO `tblpurchasedata`(`customerId`, `VehicleId`, `no_purchase`, `total_amount`, `purchase_date`) VALUES ('".$customerId."', '".$vehicleId."', '".$numberOfVehicle."', '".$totalAmount."', '".$purchaseDate."')";
    $run = mysqli_query($conn, $sql);
    if($run){
      $_SESSION['message']= '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill"></i><span class="text">Data Add Successfully</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
      header("location: purchase.php");
    }else{
      $_SESSION['message']= '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-circle-fill"></i>
      <span class="text">Something Wrong</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
      header("location: purchase.php");
    }
    
  }
?>