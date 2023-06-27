<?php 
 include('conn.php');
 include('session.php');
 if(isset($_POST['update-profile'])){
    $id = $_POST['profileId'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    if ($name == $_SESSION['user_data']['name'] && $username = $_SESSION['user_data']['username']){
      echo "Update condition met";
      $query = "UPDATE `tblmasteradmin` SET `name` = '".$name."', `username` =  '".$username."' WHERE adminId = '" .  $id . "' ";
      $result = mysqli_query($conn, $query);
      if($result){
        echo "Data Update";
        header("Location : myaccount.php");
      }else{
        echo "Something Wrong";
        header("Location : myaccount.php");
      }
    }
  }
?>