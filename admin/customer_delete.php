<?php
include("conn.php");
include("session.php");
if (isset($_POST['deleteData'])) {
    $id = $_POST['delete'];
    $query = "DELETE FROM `tblmastercustomer` WHERE customerId = '" . $id . "'";
    $run = mysqli_query($conn, $query);
    if ($run) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill"></i>
          <span class="text">Delete Data Successfully</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        header("location: customer.php");
    }
    else {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-circle-fill"></i>
          <span class="text">Data Not Delete</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        header("location: customer.php");
    }

}
?>