<?php
include("header.php");
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management|Purchase Data</title>
</head>
<!-- css styling -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        box-sizing: border-box;
        font-family: 'Montserrat' sans-serif;
        background: #f5f5f5;
        width: 100%;
    }

    .main-body {
        transition: margin-left 0.3s ease;
        margin-left: 250px;
        margin-top: 90px;
        width: calc(100% - 250px);
        padding: 20px;
    }

    .addPurchaseButton {
        margin-bottom: 20px;
        width: 100%;
        display: flex;
        /* display: flex; */
        justify-content: end;
       justify-content: space-between;

    }

    .addPurchaseButton a.btn-primary,
    button.btn-primary {
        background-color: #0066ff;
        border: none;
        outline: 0;
        box-shadow: none;
        font-size: 18px;
    }

    .addPurchaseButton a.btn-primary:hover,
    button.btn-primary:hover {
        background-color: #80b3ff;
        box-shadow: none;
    }

    .addPurchaseButton a.btn-primary:focus,
    button.btn-primary:focus {
        outline: 0;
        box-shadow: none;
        border: none;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus {
        border: none;
        box-shadow: none;
    }
    .addPurchaseButton input.form-control{
        margin-bottom: 0;
        border-radius: 5px;
        border: 1px solid #D8C9C6;
    }
   .addPurchaseButton .btn-success{
        background-color: #0066ff;
        border: 0;
    }
    .addPurchaseButton .btn-success:hover{
        background-color: #80b3ff;
        box-shadow: none;
        border: 0;
    }
    .addPurchaseButton .btn-success:focus{
       box-shadow: none;
       border: none;
    }
    .addPurchaseButton .btn:focus{
        box-shadow: none;
        border: none;
    }
    .btn-success:not(:disabled):not(.disabled):active:focus{
        box-shadow: none;
        border: none;
    } 
    .btn-success:not(:disabled):not(.disabled):active{
        background-color: #80b3ff;
    } 

    #purchaseModalForm {
        width: 100%;
    }

    .modal-header,
    .modal-footer {
        border: none;
    }

    .modal-header .modal-title {
        font-size: 25px;
        font-weight: 700;
    }

    input.form-control {
        border: 1px solid #D8C9C6;
        color: #262626;
        border-radius: 0;
        outline: 0;
        font-size: 15px;
        height: 40px;
    }

    input.form-control::placeholder {
        color: #262626;
    }

    input.form-control:focus {
        box-shadow: none;
    }

    select.form-control {
        border: 1px solid #D8C9C6;
        color: #262626;
        border-radius: 0;
        font-size: 15px;
        height: 40px;
    }

    select.form-control:focus {
        box-shadow: none;
    }

    .form-group #formControlInput-5 {
        border: none;
    }

    .form-group label {
        font-weight: 600;
        font-size: 15px;
    }

    .modal-dialog .modal-content {
        padding: 0 10px;
    }

    .table thead tr th {
        border: none;
        background: #0000b3;
        text-align: center;
        color: #ffffff;
        border: 2px solid #f5f5f5;
        vertical-align: middle;
    }

    .table tbody tr th,
    .table tbody tr td {
        background-color: #FFFFFF;
        text-align: center;
        border: 2px solid #f5f5f5;
        color: #3d3d29;
        vertical-align: middle;
    }

    .table tbody tr td {
        font-weight: 500;

    }

    #nameDropdown,
    #vehicleDropdown {
        height: auto;
    }

    #nameDropdown ul,
    #vehicleDropdown ul {
        list-style: none;
    }

    #nameDropdown ul li:hover,
    #vehicleDropdown ul li:hover {
        cursor: pointer;
    }

    .alert .bi {
        font-size: 25px;
        margin-right: 20px;
    }

    .alert {
        vertical-align: middle;
    }

    .alert-success {
        background-color: green;
        color: #fff;
    }

    .alert-success .text {
        font-size: 20px;
        font-weight: 600;
    }

    .alert .close {
        color: #fff;
        opacity: 1;
    }

    .alert-warning {
        background-color: red;
        color: #fff;
    }  
    .pagination{
        float: right;
    }
    .page-link:focus{
        box-shadow: none;
    }
    .page-item.active .page-link{
        background-color: #0000b3;
        border-color: #0000b3;
    }

    @media only screen and (max-width: 1200px) {
        .main-body {
            margin-left: 70px;
            width: calc(100% - 70px);
        }
    }

    @media only screen and (max-width: 810px) {
        .main-body {
            width: 100% !important;
            margin-left: 0;
            transition: 0.3s ease all;
        }
    }
</style>

<body>
    <div class="main-body">
        <div class="msg">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </div>
     
        <!-- Modal Customer Form Start-->
        <div class="modal fade" id="purchaseModalForm" tabindex="-1" aria-labelledby="purchaseModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="PurchaseModalLabel">Purchase Data Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="purchase_add.php" method="post" enctype="multipart/form-data" id="customerForm">
                            <input type="hidden" class="form-control" id="customerId" placeholder="Id" name="customerId"
                                required>
                            <div class="form-group">
                                <label for="nameInput">Customer Name</label>
                                <input type="text" class="form-control" id="nameInput" placeholder="Customer Name"
                                    name="cname" required>
                                <div class="form-control" id="nameDropdown"></div>
                            </div>
                            <div class="form-group">
                                <label for="mobileInput" class="d-block">Phone Number</label>
                                <input type="text" class="form-control mobileNo d-inline-block " id="mobileInput"
                                    placeholder="Phone Number" name="mobile">
                                <!-- <span id="error" class="hide error d-block" style="color:red;"></span> -->
                            </div>
                            <div class="form-group">
                                <label for="addressInput">Address</label>
                                <input type="text" class="form-control" id="addressInput" name="address"
                                    placeholder="eg.123, Example">

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cityInput">City</label>
                                    <input type="text" class="form-control" id="cityInput" name="city"
                                        placeholder="City">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stateInput">State</label>
                                    <input type="text" class="form-control" id="stateInput" name="state"
                                        placeholder="State">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="countryInput">Country</label>
                                    <input type="text" class="form-control" id="countryInput" name="country"
                                        placeholder="Country">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pincodeInput">Pincode</label>
                                    <input type="text" class="form-control" id="pincodeInput" name="pincode"
                                        placeholder="Pincode">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="vehicleId" placeholder="Id" name="vehicleId"
                                required>
                            <div class="form-group">
                                <label for="variantInput">Variant Name</label>
                                <input class="form-control" id="variantInput" placeholder="Enter Varinat"
                                    name="variant">
                                <div class="form-control" id="vehicleDropdown"></div>
                            </div>
                            <div class="form-group">
                                <label for="priceInput">Price</label>
                                <input type="text" class="form-control" id="priceInput" placeholder="0000$"
                                    name="price">
                            </div>
                            <div class="form-group">
                                <label for="novehicleInput">Number Of Vehicle</label>
                                <input type="number" class="form-control" id="novehicleInput"
                                    placeholder="Number Of Vehicle" name="numberOfVehicle">
                            </div>
                            <div class="form-group">
                                <label for="totalAmount">Total Amount</label>
                                <input type="text" class="form-control" id="totalAmount" placeholder="Total Amount"
                                    name="totalAmount">
                            </div>
                            <div class="form-group">
                                <label for="purchaseDate">Purchase Date</label>
                                <input type="date" class="form-control" id="purchaseDate" placeholder="Purchase Date"
                                    name="purchaseDate">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="submit_data" id="submit-data">Add
                                    Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Customer Form End-->
           <!-- Button trigger modal -->
           <div class="addPurchaseButton">
            <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true" data-toggle="modal"
                data-target="#purchaseModalForm">Add Purchase</a>
            <form class="form-inline" action="" method="">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search" aria-label="Search"
                    id="search" onkeyup="searchFun()">
              
            </form>
        </div>
        <!-- Purchase Data Table Start-->
        <div class="table-vehicle">
            <table class="table table-striped" id="customerTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Contact Details</th>
                        <th scope="col">Adddress</th>
                        <th scope="col">Vehicle Details</th>
                        <th scope="col">Number Of Vehicle</th>
                        <th scope="col">Total Number</th>
                        <th scope="col">Purchase Date</th>
                    </tr>
                </thead>
                <?php
                 $limit = 5;
                 if(isset($_GET['page'])){
                     $page = $_GET['page'];
                 }else{
                     $page = 1;
                 }
                 $offset = ($page - 1) * $limit;
                $sql = "SELECT p.purchaseId, c.name, c.countrycode, c.mobile, c.address, c.city, c.state, c.country, c.pincode, v.variant, v.price, p.no_purchase, p.total_amount, p.purchase_date FROM tblpurchasedata p INNER JOIN tblmastercustomer c ON p.customerId = c.customerId INNER JOIN tblmastervehicle v ON p.vehicleId = v.vehicleId WHERE v.isDeleted='0' ORDER BY purchaseId ASC LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Query failed: " . mysqli_error($conn));
                }
                $i = 1;
                while ($fetch = mysqli_fetch_object($result)) {
                    $purchaseId = $fetch->purchaseId;
                    $customerName = $fetch->name;
                    $countryCode = $fetch->countrycode;
                    $mobile = $fetch->mobile;
                    $phoneNumber = $countryCode . $mobile;
                    $add = $fetch->address;
                    $city = $fetch->city;
                    $state = $fetch->state;
                    $country = $fetch->country;
                    $pincode = $fetch->pincode;
                    $variant = $fetch->variant;
                    $price = $fetch->price;
                    $numberOfPurchase = $fetch->no_purchase;
                    $totalAmount = $fetch->total_amount;
                    $pDate = $fetch->purchase_date;
                    $purchaseDate = date('d/m/y', strtotime($pDate));
                    $vehicleDetails = $variant . '</br>' . $price
                ?>

                    <tbody>
                        <th scope="row">
                            <?php echo $purchaseId; ?>
                        </th>
                        <td>
                            <?php echo $customerName; ?>
                        </td>
                        <td>
                            <?php echo $phoneNumber; ?>
                        </td>
                        <td>
                            <span class="address-preview">
                                <?php
                                // Combine the address, city, country, state, and pincode into a single string
                                $address = $add . ',<br/>' . $city . ',<br/>' . $state . ',<br/>' . $country . '-' . $pincode;

                                // Display a preview of the address (e.g., first 50 characters)
                                echo substr($address, 0, 50);
                                ?>
                            </span>
                            <?php
                            // Check if the address length exceeds the preview length
                            if (strlen($address) > 50):
                                ?>
                                <span class="address-full" style="display: none;">
                                    <?php echo $address; ?>
                                </span>
                                <a href="#" class="read-more-btn">Read More</a>
                                <?php
                            endif
                            ?>
                        </td>
                        <td>
                            <?php echo $vehicleDetails; ?>
                        </td>
                        <td>
                            <?php echo $numberOfPurchase; ?>
                        </td>
                        <td>
                            <?php echo $totalAmount; ?>
                        </td>
                        <td>
                            <?php echo $purchaseDate; ?>
                        </td>
                    </tbody>
                    <?php
                    $i++;
                }
                ?>
                  <tfoot>
                    <tr id="dataNotFoundRow" style="display: none;">
                        <td colspan="8" align="center">Data not found</td>
                    </tr>
                </tfoot>

            </table>
              <!-- Paggination Add -->
              <?php
             $sql = "SELECT * FROM `tblpurchasedata`";
             $run = mysqli_query($conn, $sql) or die('Query Failed.');
             if(mysqli_num_rows($run) > 0){
                $totalRecord = mysqli_num_rows($run);
                $totalPage =   ceil($totalRecord /  $limit);
                echo ' <ul class="pagination">';
                if($page > 1){
                    echo ' <li class="page-item">
                <a class="page-link" href="purchase.php?page='.($page - 1).'" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>';
                }
              
              for($i=1; $i <= $totalPage; $i++){
                if($i == $page){
                    $active = "active";
                }else{
                    $active = "";
                }
                echo ' <li class="page-item '.$active .'" aria-current="page"><a class="page-link" href="purchase.php?page='.$i.'">'.$i.'</a></li>';
              }
              if($totalPage > $page){
                echo '<li class="page-item"><a class="page-link" href="purchase.php?page='.($page + 1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span>
                </a></li>';
              }
            
              echo '</ul>';
             }
             ?>

        </div>
    </div>
    <script>
        // Search Purchase Data
         function searchFun() {
            let filter = document.getElementById('search').value.toUpperCase();
            let table = document.getElementById('customerTable');
            let tr = table.getElementsByTagName('tr');

            let resultsFound = false; // Flag to track if any results are found

            for (var i = 1; i < tr.length; i++) {
                let tdArray = tr[i].getElementsByTagName('td');
                let rowMatch = false; // Flag to track if the row contains a match

                for (var j = 0; j < tdArray.length; j++) {
                    let td = tdArray[j];
                    if (td) {
                        let textValue = td.textContent || td.innerHTML;
                        if (textValue.toUpperCase().indexOf(filter) > -1) {
                            rowMatch = true;
                            break; // Exit the loop if a match is found in any column
                        }
                    }
                }

                if (rowMatch) {
                    tr[i].style.display = '';
                    resultsFound = true;
                } else {
                    tr[i].style.display = 'none';
                }
            }

            // Show/hide the "Data not found" row based on results
            let dataNotFoundRow = document.getElementById('dataNotFoundRow');
            if (!resultsFound) {
                dataNotFoundRow.style.display = '';
            } else {
                dataNotFoundRow.style.display = 'none';
            }
        }
        // function fetchNames(inputValue){
        //     $.ajax({
        //     type: "POST",
        //     url: "purchase-data.php",
        //     dataType: 'json',
        //     data: { name: inputValue },
        //     success: function (response) {

        //         $('#addressInput').val(response.address);

        //       // Handle the response from the server
        //       // Populate a dropdown list or display the names below the input field
        //     }
        //   });
        // 
        $(document).ready(function () {
            $('.read-more-btn').click(function () {
                var addressPreview = $(this).siblings('.address-preview');
                var addressFull = $(this).siblings('.address-full');

                if (addressFull.is(':hidden')) {
                    addressPreview.hide();
                    addressFull.show();
                    $(this).text('Read Less');
                } else {
                    addressFull.hide();
                    addressPreview.show();
                    $(this).text('Read More');
                }
            });
            $('#nameDropdown').hide();
            $('#nameInput').on('input', function () {
                var name = $(this).val();

                if (name.length > 0) {
                    $.ajax({
                        url: 'purchase-data.php',
                        type: 'POST',
                        data: { name: name },
                        success: function (response) {
                            var nameList = JSON.parse(response);

                            // Clear previous options
                            $('#nameDropdown').empty();

                            // Add new options
                            $.each(nameList, function (index, value) {
                                $('#nameDropdown').append('<ul><li value="' + value + '">' + value + '</li></ul>');
                            });
                            $('#nameDropdown').show();
                        }
                    });
                } else {
                    $('#nameDropdown').hide();

                }

            });
            $(document).on('click', '#nameDropdown ul li', function () {
                var selectedName = $(this).text();
                $('#nameInput').val(selectedName);
                $('#nameDropdown').hide();
                $.ajax({
                    url: 'purchase-data.php',
                    type: 'POST',
                    data: { selectedName: selectedName },
                    success: function (response) {
                        var data = JSON.parse(response);

                        // Populate address fields
                        $('#customerId').val(data.customerId)
                        // $('#mobileInput').val(data.mobile);
                        var mobileInput = document.querySelector("#mobileInput");
                        mobileInput.value = data.countryCode + data.mobile;
                        $('#addressInput').val(data.address);
                        $('#cityInput').val(data.city);
                        $('#stateInput').val(data.state);
                        $('#countryInput').val(data.country);
                        $('#pincodeInput').val(data.pincode);
                    }
                });
            });
            $('#vehicleDropdown').hide();
            $('#variantInput').on('input', function () {
                var variant = $(this).val();

                if (variant.length > 0) {
                    $.ajax({
                        url: 'purchase-data.php',
                        type: 'POST',
                        data: { variant: variant },
                        success: function (response) {
                            var variantList = JSON.parse(response);

                            // Clear previous options
                            $('#vehicleDropdown').empty();

                            // Add new options
                            $.each(variantList, function (index, value) {
                                $('#vehicleDropdown').append('<ul><li value="' + value + '">' + value + '</li></ul>');
                            });
                            $('#vehicleDropdown').show();
                        }
                    });
                } else {
                    $('#vehicleDropdown').hide();

                }

            });
            $(document).on('click', '#vehicleDropdown ul li', function () {
                var selectedVariant = $(this).text();
                $('#variantInput').val(selectedVariant);
                $('#vehicleDropdown').hide();
                $.ajax({
                    url: 'purchase-data.php',
                    type: 'POST',
                    data: { selectedVariant: selectedVariant },
                    success: function (response) {
                        var data = JSON.parse(response);

                        // Populate address fields
                        $('#vehicleId').val(data.vehicleId);
                        $('#priceInput').val(data.price);


                        // Calculate and display total price based on quantity
                        $('#novehicleInput').on('input', function () {

                            var quantity = $(this).val();
                            var totalPrice = quantity * data.price;

                            $('#totalAmount').val(totalPrice);
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>