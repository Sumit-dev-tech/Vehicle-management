<?php
 include('conn.php');
 include('session.php');
 if(isset($_POST['update-profile'])){
    $adminId = $_POST['profileDataId'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "UPDATE `tblmasteradmin` SET `name`='".$name."', `username`='".$username."',`password`='".$password."' WHERE `adminId` = $adminId ";
    $run = mysqli_query($conn, $sql);
    if($run){
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i><span class="text">Data Update Successfully</span>
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
      </div>';
        header("location: myaccount.php"); 
    }
 }

?>