<?php
  include ('conn.php');
  include('session.php');
  // if(isset($_POST['name'])){
  //   $inputValue = $_POST['name'];
  //   $query = "SELECT name FROM `tblmastercustomer` WHERE name LIKE '%$inputValue%'";
  //   $result = mysqli_query($conn, $query);
  //   $names = array();
  //   while($row = mysqli_fetch_assoc($result)){
  //     $names[] = $row['name'];
  //   }
  //   echo json_encode($names);
  // }
  if (isset($_POST['name'])) {
    $name = $_POST['name'];

    $query = "SELECT * FROM `tblmastercustomer` WHERE name LIKE '%$name%'";
    $result = mysqli_query($conn, $query);

    $nameList = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $nameList[] = $row['name'];
    }

    echo json_encode($nameList);
    exit;
}
if (isset($_POST['selectedName'])) {
  $selectedName = $_POST['selectedName'];

  $query = "SELECT * FROM `tblmastercustomer` WHERE name = '". $selectedName."'";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);
  echo json_encode($data);
  exit;
}
if (isset($_POST['variant'])) {
  $variant = $_POST['variant'];

  $query = "SELECT * FROM `tblmastervehicle` WHERE variant LIKE '%$variant%'";
  $result = mysqli_query($conn, $query);

  $variantList = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $variantList[] = $row['variant'];
  }

  echo json_encode($variantList);
  exit;
}
if (isset($_POST['selectedVariant'])) {
$selectedVariant = $_POST['selectedVariant'];

$query = "SELECT * FROM `tblmastervehicle` WHERE variant = '". $selectedVariant."'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
echo json_encode($data);
exit;
}
     
?>