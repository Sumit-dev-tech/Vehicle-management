<?php
  include ('conn.php');
  include('session.php');
  if(isset($_POST['update-password'])){
    $id = $userdata->adminId;
    $oldPassword = $_POST['cpassword'];
    $newPassword = $_POST['npassword'];
    $query ="SELECT `password` FROM `tblmasteradmin` WHERE `adminId` = '".$id."'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];
    if(md5($oldPassword) === $storedPassword){
        // Hash the new password
        $hashPassword = md5($newPassword);
        // Update the password in the database
        $updateQuery = "UPDATE `tblmasteradmin` SET `password` = '".$hashPassword."' WHERE `adminId` = '".$id."'";
        $run = mysqli_query($conn, $updateQuery);
        if($run){
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill"></i><span class="text">Password Update Successfully</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
        header("location: myaccount.php");
        }else{
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span class="text">Something Wrong</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'.mysqli_error($conn);
              header("location: myaccount.php");
        }
    }else{
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span class="text">Current Password is Incorrect.<span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
          header("location: myaccount.php");
    }
  }
?>