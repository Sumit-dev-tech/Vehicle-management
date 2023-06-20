<?php
include("conn.php");
include("session.php");
 if(isset($_POST['deleteData'])){
    $id = $_POST['delete'];
    $isDelete = true;
    if($isDelete){
      $query = "UPDATE `tblmastervehicle` SET isDeleted = 1 WHERE vehicleId = '".$id."'";
      $run = mysqli_query($conn, $query);
      if($run){
          $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill"></i>
          <span class="text">Delete Data Successfully</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
          header("location: vehicle.php"); 
      }else{
          $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-circle-fill"></i>
          <span class="text">Data Not Delete</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
          header("location: vehicle.php");
      }

    }
       
}
// if(isset($_POST['deleteData'])){
//     $id = $_POST['delete'];
//     $isDelete = true;

//     if($isDelete){
//         // Delete the data physically
//         $query = "DELETE FROM `tblmastervehicle` WHERE vehicleId = '".$id."'";
//         $run = mysqli_query($conn, $query);

//         if($run){
//           // include("conn.php");
//             // Update the isDeleted flag
//             $updateQuery = "UPDATE `tblmastervehicle` SET isDeleted = 1 WHERE vehicleId = '".$id."'";
//             $updateRun = mysqli_query($conn, $updateQuery);

//             if($updateRun){
//                 $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//                 <i class="bi bi-check-circle-fill"></i>
//                 <span class="text">Delete Data Successfully</span>
//                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true">&times;</span>
//                 </button>
//                 </div>';
//                 header("location: vehicle.php");
//             }else{
//                 $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//                 <i class="bi bi-exclamation-circle-fill"></i>
//                 <span class="text">Data Not Deleted</span>
//                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true">&times;</span>
//                 </button>
//                 </div>';
//                 header("location: vehicle.php");
//             }
//         }else{
//             $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//             <i class="bi bi-exclamation-circle-fill"></i>
//             <span class="text">Data Not Deleted</span>
//             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                 <span aria-hidden="true">&times;</span>
//             </button>
//             </div>';
//             header("location: vehicle.php");
//         }

//         // Close the database connection
//         mysqli_close($conn);
//     }
// }
// if(isset($_POST['deleteData'])){
//     $id = $_POST['delete'];
//     $isDelete = true;

//     if($isDelete){
//         // Update the isDeleted flag
//         $updateQuery = "UPDATE `tblmastervehicle` SET isDeleted = 1 WHERE vehicleId = '".$id."'";
//         $updateRun = mysqli_query($conn, $updateQuery);

//         if($updateRun){
//             // Delete the data physically
//             $deleteQuery = "DELETE FROM `tblmastervehicle` WHERE vehicleId = '".$id."'";
//             $deleteRun = mysqli_query($conn, $deleteQuery);

//             if($deleteRun){
//                 $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//                 <i class="bi bi-check-circle-fill"></i>
//                 <span class="text">Delete Data Successfully</span>
//                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true">&times;</span>
//                 </button>
//                 </div>';
//                 header("location: vehicle.php");
//             }else{
//                 $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//                 <i class="bi bi-exclamation-circle-fill"></i>
//                 <span class="text">Data Not Deleted</span>
//                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true">&times;</span>
//                 </button>
//                 </div>';
//                 header("location: vehicle.php");
//             }
//         }else{
//             $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//             <i class="bi bi-exclamation-circle-fill"></i>
//             <span class="text">Data Not Deleted</span>
//             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                 <span aria-hidden="true">&times;</span>
//             </button>
//             </div>';
//             header("location: vehicle.php");
//         }

//         // Close the database connection
//         mysqli_close($conn);
//     }
// }
?>


