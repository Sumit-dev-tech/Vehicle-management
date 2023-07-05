<?php
include("header.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link for  -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"> -->
    <title>Vehicle Management|Customer</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background: #f5f5f5;
        width: 100%;
    }

    .main-body {
        margin-left: 250px;
        margin-top: 90px;
        width: calc(100% - 250px);
        padding: 20px;

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

    .addCustomerButton {
        display: flex;
        margin-bottom: 20px;
        width: 100%;
        justify-content: space-between;
        align-items: center;
    }

    .addCustomerButton input.form-control {
        margin-bottom: 0;
        border-radius: 5px;
        border: 1px solid #D8C9C6;
    }

    .addCustomerButton .btn-success {
        background-color: #0066ff;
        border: 0;
    }

    .addCustomerButton .btn-success:hover {
        background-color: #80b3ff;
        box-shadow: none;
        border: 0;
    }

    .addCustomerButton .btn-success:focus {
        box-shadow: none;
        border: none;
    }

    .addCustomerButton .btn:focus {
        box-shadow: none;
        border: none;
    }

    .btn-success:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
        border: none;
    }

    .btn-success:not(:disabled):not(.disabled):active {
        background-color: #80b3ff;
    }

    .btn-primary {
        background-color: #0066ff;
        border: none;
        font-size: 18px;
        box-shadow: none;
        outline: 0;
    }

    .btn-primary:hover {
        background-color: #80b3ff;
        box-shadow: none;
    }

    .btn-primary:focus {
        box-shadow: none;
        outline: 0;
        border: none;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus {
        border: none;
        box-shadow: none;
    }

    #customerModelForm {
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

    .form-group label,
    div.genderSelect {
        font-weight: 600;
        font-size: 15px;
    }

    .form-check label.form-check-label {
        font-weight: 500;
        font-size: 15px;
    }

    input[type="date"] {
        color: #262626;
    }

    ::-webkit-calendar-picker-indicator {
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;

    }

    .modal-dialog .modal-content {
        padding: 0 10px;
    }

    #customerDeleteModal {
        margin: auto;
        padding-top: 180px;
    }

    .btn-danger:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    .btn-secondary:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    #countryCodeDropdown {
        position: absolute;
        left: -89%;
        top: -12.5%;
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

    a.read-more-btn {
        color: blue;
    }

    .iti--allow-dropdown {
        width: 100%;
    }

    .iti__country-list {
        max-width: 350px;
        overflow-x: hidden;
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
        <div class="modal fade" id="customerModalForm" tabindex="-1" aria-labelledby="customerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerModalLabel">Customer Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="customer_add.php" method="post" enctype="multipart/form-data" id="customerForm">
                            <div class="form-group">
                                <label for="nameInput">Customer Name</label>
                                <input type="text" class="form-control" id="nameInput-1" placeholder="Customer Name"
                                    name="cname" required>
                            </div>
                            <div class="form-group">
                                <label for="mobileInput" class="d-block">Phone Number</label>
                                <input type="hidden" class="form-control d-inline-block w-30" id="countryCode"
                                    name="countrycode">
                                <input type="tel" class="form-control d-inline-block w-70" id="mobileInput-1"
                                    placeholder="Phone Number" name="mobile" required>
                                <span id="error_message" class="error d-block" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="emailInput">Email Address</label>
                                <input type="email" class="form-control" id="emailInput-1" placeholder="Email Address"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <div class="genderSelect mb-1">Gender</div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender" id="maleInput-1"
                                        value="Male">
                                    <label for="maleInput" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender" id="femaleInput-1"
                                        value="Female">
                                    <label for="femaleInput" class="form-check-label">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender" id="otherInput-1"
                                        value="Other">
                                    <label for="otherInput" class="form-check-label">Other</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dobInput">Date Of Birth</label>
                                <input type="date" class="form-control dateInput" id="dobInput-1" name="dob"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="addressInput">Address</label>
                                <input type="text" class="form-control" id="addressInput-1" name="address"
                                    placeholder="eg.123, Example">

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cityInput">City</label>
                                    <input type="text" class="form-control" id="cityInput-1" name="city"
                                        placeholder="City">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stateInput">State</label>
                                    <input type="text" class="form-control" id="stateInput-1" name="state"
                                        placeholder="State">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="countryInput">Country</label>
                                    <input type="text" class="form-control" id="countryInput-1" name="country"
                                        placeholder="Country">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pincodeInput">Pincode</label>
                                    <input type="text" class="form-control" id="pincodeInput-1" name="pincode"
                                        placeholder="Pincode">
                                </div>
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
        <!-- Customer Data Table Start-->
        <!-- search query -->
        <!-- Model trigger Button -->
        <div class="addCustomerButton">
            <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true" data-toggle="modal"
                data-target="#customerModalForm">Add Customer</a>
            <form class="form-inline" action="" method="GET">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search" aria-label="Search"
                    id="search" onkeyup="searchFun()">
                <!-- <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i
                        class="bi bi-search"></i></button> -->
            </form>
        </div>
        <div class="table-vehicle">
            <table class="table table-striped" id="customerTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Phone#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Address</th>
                        <th scope="col">Option</th>
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
                $query = "SELECT * FROM `tblmastercustomer` LIMIT {$offset},{$limit}";
                $run = mysqli_query($conn, $query);
                $i = 1;
                while ($fetch = mysqli_fetch_object($run)) {
                    $formatedob = $fetch->dob;
                    $countryCode = $fetch->countrycode;
                    $add = $fetch->address;
                    $city = $fetch->city;
                    $state = $fetch->state;
                    $country = $fetch->country;
                    $pincode = $fetch->pincode;
                    $formatdobDate = date('d/m/y', strtotime($formatedob));
                    $phoneNumber = $countryCode . $fetch->mobile;

                    ?>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <?php echo $fetch->customerId; ?>
                            </th>
                            <td>
                                <?php echo $fetch->name; ?>
                            </td>
                            <td>
                                <?php echo $phoneNumber; ?>
                            </td>
                            <td>
                                <?php echo $fetch->email; ?>
                            </td>
                            <td>
                                <?php echo $fetch->gender; ?>
                            </td>
                            <td class="dob">
                                <?php echo $formatdobDate; ?>
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
                            <td class="button-group">
                                <button type="button" class="btn btn-primary mr-1 mt-1 edit-btn" name="uploadData"
                                    data-id="<?php echo $fetch->customerId; ?>" data-toggle="modal"
                                    data-target="#customerModalEditForm"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-danger  mt-1 mr-1 delete-btn" name="deleteData"
                                    data-toggle="modal" data-id="<?php echo $fetch->customerId; ?>"
                                    data-target="#customerDeleteModal"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
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
             $sql = "SELECT * FROM `tblmastercustomer`";
             $run = mysqli_query($conn, $sql) or die('Query Failed.');
             if(mysqli_num_rows($run) > 0){
                $totalRecord = mysqli_num_rows($run);
                $totalPage =   ceil($totalRecord /  $limit);
                echo ' <ul class="pagination">';
                if($page > 1){
                    echo ' <li class="page-item">
                <a class="page-link" href="customer.php?page='.($page - 1).'" aria-label="Previous">
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
                echo ' <li class="page-item '.$active .'" aria-current="page"><a class="page-link" href="customer.php?page='.$i.'">'.$i.'</a></li>';
              }
              if($totalPage > $page){
                echo '<li class="page-item"><a class="page-link" href="customer.php?page='.($page + 1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span>
                </a></li>';
              }
            
              echo '</ul>';
             }
             ?>
        </div>
        <!-- Customer Data Table End-->
        <!-- Modal Edit Customer Form Start-->
        <div class="modal fade" id="customerModalEditForm" tabindex="-1" aria-labelledby="customerModalEditLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerModalEditLabel">Edit Customer Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="customer_edit.php" method="post" enctype="multipart/form-data" id="customerEditForm">
                            <input type="hidden" class="customer-edit" name="id" id="customer-edit">
                            <div class="form-group">
                                <label for="nameInput">Customer Name</label>
                                <input type="text" class="form-control" id="nameInput" placeholder="Customer Name"
                                    name="cname">
                            </div>
                            <div class="form-group">
                                <label for="mobileInput" class="d-block">Phone Number</label>
                                <input type="hidden" class="form-control d-inline-block " id="countryCode-1"
                                    name="countryCode">
                                <input type="tel" class="form-control d-inline-block" id="mobileInput"
                                    placeholder="Phone Number" name="mobile">
                                <span id="error-1" class="hide error d-block" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="emailInput">Email Address</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="Email Address"
                                    name="email" readonly>
                            </div>
                            <div class="form-group">
                                <div class="genderSelect mb-1">Gender</div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input gender" name="gender" id="maleInput"
                                        value="Male">
                                    <label for="maleInput" class="form-check-label gender">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input gender" name="gender" id="femaleInput"
                                        value="Female">
                                    <label for="femaleInput" class="form-check-label">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input gender" name="gender" id="otherInput"
                                        value="Other">
                                    <label for="otherInput" class="form-check-label">Other</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dobInput">Date Of Birth</label>
                                <input type="date" class="form-control" id="dobInput" placeholder="" name="dob">
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
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="update_data">Update Data</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Edit Customer Form End-->
        <!-- Modal Delete Data start-->
        <div class="modal fade" id="customerDeleteModal" tabindex="-1" aria-labelledby="VehicleDeleteModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <form method="post" action="customer_delete.php">
                            <input type="hidden" id="deleteCustomerRow" name="delete">
                            <h4 class="h4">Are You Sure Delete Data</h4>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="deleteData" id="delete-2"><i
                                        class="bi bi-trash3 mr-1"></i>Delete</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Delete Data End-->
    </div>

    <script src="../js/international_phone.js"></script>
    <script type="text/javascript">
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



        // Country code list with country flags   
        // const input = document.querySelector('.mobileNo');

        //   const iti = window.intlTelInput(input, {
        //     initialCountry: 'auto',
        //     geoIpLookup: callback => {
        //       fetch('https://ipapi.co/json').then(res => res.json()).then(data => callback(data.country_code)).catch(() => callback('us'));
        //     },
        //     separateDialCode: true,
        //     utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.min.js',
        //   });

        //     // Set the default country based on the user's country
        //     // const setDefaultCountry = () => {
        //     //   const defaultCountry = iti.getSelectedCountryData();
        //     //   const defaultFlagElement = document.createElement('div');
        //     //   defaultFlagElement.classList.add('iti__selected-flag');
        //     //   defaultFlagElement.innerHTML = `<div class="iti__flag iti__${defaultCountry.iso2}"></div>`;

        //     //   const selectedFlagElement = mobileNumberInput.parentElement.querySelector('.iti__selected-flag');
        //     //   selectedFlagElement.replaceWith(defaultFlagElement);
        //     // };

        //     // // Initialize the plugin after it has finished loading
        //     // iti.promise.then(setDefaultCountry);

        //     // Mobile number validation
        //     input.addEventListener('input', validateMobileNumber);

        //     function validateMobileNumber() {
        //         const isValidNumber = iti.isValidNumber();

        //         if (!isValidNumber) {
        //             showError('Invalid mobile number');
        //         } else {
        //             clearError();
        //         }
        //     }

        //     function showError(message) {
        //         const errorMessage = document.getElementById('error');
        //         errorMessage.innerHTML = message;
        //     }

        //     function clearError() {
        //         const errorMessage = document.getElementById('error');
        //         errorMessage.innerHTML = '';
        //     }
        // Date Picker
        // document.addEventListener('DOMContentLoaded', function () {
        //     var dobInput = document.getElementsById('dobInput-1');
        //     var calendar = document.createElement('div');
        //     calendar.className = 'calendar';

        //     dobInput.parentNode.insertBefore(calendar, dobInput.nextSibling);

        //     dobInput.addEventListener('focus', function () {
        //         calendar.style.display = 'block';
        //     });

        //     dobInput.addEventListener('blur', function () {
        //         calendar.style.display = 'none';
        //     });

        //     function formatDate(date) {
        //         var day = date.getDate();
        //         var month = date.getMonth() + 1;
        //         var year = date.getFullYear();
        //         return day + '/' + month + '/' + year;
        //     }

        //     function generateCalendar() {
        //         var currentDate = new Date();
        //         var currentMonth = currentDate.getMonth();
        //         var currentYear = currentDate.getFullYear();

        //         var calendarHTML = '';
        //         calendarHTML += '<div class="month">';
        //         calendarHTML += '<span class="prev">&#10094;</span>';
        //         calendarHTML += '<span class="next">&#10095;</span>';
        //         calendarHTML += '<span class="month-label">' + formatDate(currentDate) + '</span>';
        //         calendarHTML += '</div>';

        //         calendarHTML += '<div class="weekdays">';
        //         calendarHTML += '<div>Mon</div>';
        //         calendarHTML += '<div>Tue</div>';
        //         calendarHTML += '<div>Wed</div>';
        //         calendarHTML += '<div>Thu</div>';
        //         calendarHTML += '<div>Fri</div>';
        //         calendarHTML += '<div>Sat</div>';
        //         calendarHTML += '<div>Sun</div>';
        //         calendarHTML += '</div>';

        //         var firstDay = new Date(currentYear, currentMonth, 1);
        //         var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        //         var dayOfWeek = firstDay.getDay();

        //         calendarHTML += '<div class="days">';
        //         var dayCounter = 1;

        //         for (var i = 0; i < 6; i++) {
        //             for (var j = 0; j < 7; j++) {
        //                 if (i === 0 && j < dayOfWeek) {
        //                     calendarHTML += '<div></div>';
        //                 } else if (dayCounter <= daysInMonth) {
        //                     calendarHTML += '<div class="day">' + dayCounter + '</div>';
        //                     dayCounter++;
        //                 }
        //             }
        //         }

        //         calendarHTML += '</div>';

        //         calendar.innerHTML = calendarHTML;
        //     }
        // });


        $(document).ready(function () {

            // add read more button for address field
            $('.read-more-btn').click(function (event) {
                event.preventDefault(); // Prevent default anchor tag behavior
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
            // Delete data by check Id
            $('.delete-btn').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                $('#deleteCustomerRow').val(id);

            });
            // Fetch data from database using ajax
            $('.edit-btn').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                // console.log(recordId);

                // Fetch data via AJAX
                $.ajax({
                    url: 'customer_edit.php',
                    type: 'POST',
                    dataType: 'json',
                    // contentType:"appliction/json",
                    data: {
                        'id': id
                    },
                    success: function (data) {
                        console.log(data);
                        $('#customer-edit').val(data.customerId);
                        $('#nameInput').val(data.name);
                        // $('#countryCode-1').val(data.countrycode);
                        // $('#mobileInput').val(data.mobile);

                        var mobileInput = document.querySelector("#mobileInput");
                        mobileInput.value = data.countrycode + data.mobile;
                        $('#emailInput').val(data.email);
                        $('input[name=gender][value="' + data.gender + '"]').prop('checked', true);
                        $('#dobInput').val(data.dob);
                        $('#addressInput').val(data.address);
                        $('#cityInput').val(data.city);
                        $('#stateInput').val(data.state);
                        $('#countryInput').val(data.country);
                        $('#pincodeInput').val(data.pincode);
                    },
                    error: function (e) {
                        console.log(e);
                        // Handle error if the AJAX request fails
                        console.log('Failed to fetch data.');
                    }
                });
            });
        });

    </script>
</body>

</html>