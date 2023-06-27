<?php 
 include('conn.php');
 include('session.php');
 if(isset($_POST['update-profile'])){
    $id = $_POST['profileId'];
    $updateName = $_POST['name'];
    $username = $_POST['username'];
      $query = "UPDATE `tblmasteradmin` SET `name` = '".$updateName."', `username` =  '".$username."' WHERE adminId = '" .  $id . "' ";
      $result = mysqli_query($conn, $query);
      if($result){
        if(isset($_SESSION['user_data'])){
          $_SESSION['user_data']->name = $updateName;
          $_SESSION['user_data']->username = $username;
        }
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i><span class="text">Profile Update Successfully</span>
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