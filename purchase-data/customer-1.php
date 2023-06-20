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
    <title>Vehicle Management|Customer</title>
</head>
<!-- Style for Customer Table -->
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
        background: #f5f5f5;
        width: 100%;
    }

    .main-body {
        transition: margin-left 0.3s ease;
        margin-left: 250px;
        margin-top: 100px;
        width: calc(100% - 250px);
        padding: 20px;
    }

    .table thead tr th {
        border: none;
        background: linear-gradient(45deg, #e3d054 0%, #e86c1a 100%);
        text-align: center;
        color: #ffffff;
        border: 2px solid #f5f5f5;
        vertical-align: middle;
    }

    .table tbody tr th,
    .table tbody tr td {
        text-align: center;
        border: 2px solid #f5f5f5;
        color: #3d3d29;
        vertical-align: middle;
    }

    .table tbody tr td {
        font-weight: 500;

    }

    .addCustomerButton {
        margin-bottom: 20px;
        width: 100%;
        display: flex;
        /* display: flex; */
        float: right;
        justify-content: end;

    }

    .addCustomerButton a.btn-primary,
    button.btn-primary {
        background-color: #0086b3;
        border: none;
        outline: 0;
        box-shadow: none;
        font-size: 18px;
    }

    .addCustomerButton a.btn-primary:hover,
    button.btn-primary:hover {
        background-color: #8D72E1;
        box-shadow: none;
    }

    .addCustomerButton a.btn-primary:focus,
    button.btn-primary:focus {
        outline: 0;
        box-shadow: none;
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
        color: #B9ACAA;
        border-radius: 0;
        outline: 0;
        font-size: 15px;
        height: 40px;
    }

    input.form-control::placeholder {
        color: #B9ACAA;
    }

    input.form-control:focus {
        box-shadow: none;
    }

    select.form-control {
        border: 1px solid #D8C9C6;
        color: #B9ACAA;
        border-radius: 0;
        font-size: 15px;
        height: 40px;
    }

    select.form-control:focus {
        box-shadow: none;
    }

    .form-group label {
        font-weight: 600;
        font-size: 15px;
    }

    .modal-dialog .modal-content {
        padding: 0 10px;
    }

    #customerDeleteModel {
        margin: auto;
    }

    .btn-danger:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    .btn-danger:focus {
        border: none;
        box-shadow: none;
    }

    .btn-secondary:focus {
        box-shadow: none;
        border: none;
    }

    .form-check {
        display: inline-block;
    }

    .btn-secondary:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    #customerDeleteModal {
        padding-top: 180px;
    }

    label.gender-text {
        font-weight: 400;
    }

    ::-webkit-calendar-picker-indicator {
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;

    }

    input[type="date"] {
        color: #3d3d29;
    }

    @media only screen and (max-width: 1200px) {
        .main-body {
            margin-left: 70px;
            width: calc(100% - 70px);
        }
    }
</style>

<body>
    <div class="main-body">
        <!-- Button trigger modal -->
        <div class="addCustomerButton">
            <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true" data-toggle="modal" data-target="#customerModalForm">Add Vehicle</a>
        </div>
        <!-- Modal Add Data start-->
        <div class="modal fade" id="customerModalForm" tabindex="-1" aria-labelledby="customerModalForm" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerModalLabel">Customer Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="formControlInput-1">Customer Name</label>
                                <input type="text" class="form-control" id="formControlInput-1" placeholder="Name" name="cname">
                            </div>
                            <div class="form-group">
                                <label for="formControlInput-2">Phone Number</label>
                                <input type="text" class="form-control" id="formControlInput-2" placeholder="Phone Number" name="mobile">
                            </div>
                            <div class="form-group">
                                <label for="formControlInput-3">Email</label>
                                <input type="email" class="form-control" id="formControlInput-2" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <div class="genderSelect">Gender<div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="genderMale" name="gender" value="male">
                                            <label for="genderMale" class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="genderFemale" name="gender" value="female">
                                            <label for="genderFemale" class="form-check-label">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="genderOther" name="gender" value="other">
                                            <label for="genderOther" class="form-check-label">Other</label>
                                        </div>
                                    </div>
                                    <div class="form-group pt-3">
                                        <label for="formControlInput-5">Date Of Birth</label>
                                        <input type="date" class="form-control" Name="dob" id="formControlInput-5">
                                    </div>
                                    <div class="form-group">
                                        <label for="formControlInput-6">Address</label>
                                        <input type="text" class="form-control" id="formControlInput-6" name="address" placeholder="Address">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">City</label>
                                            <input type="text" class="form-control" id="inputCity" name="city" placeholder="City">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">State</label>
                                            <select name="state" class="form-control" id="inputState">
                                                <option selected>Select State</option>
                                                <option value="state-0">Maharashtra</option>
                                                <option value="state-1">Rajasthan</option>
                                                <option value="state-2">Madhya Pradesh</option>
                                                <option value="state-3">Utter Pradesh</option>
                                                <option value="state-4">Bihar</option>
                                                <option value="state-5">Delhi</option>
                                                <option value="state-6">Punjab</option>
                                                <option value="state-7">Telangana</option>
                                                <option value="state-8">Kerela</option>
                                                <option value="state-9">Tamilnadu</option>
                                                <option value="state-10">Karnataka</option>
                                                <option value="state-11">Gujrat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCountry">State</label>
                                            <select name="state" class="form-control" id="inputCountry">
                                                <option selected>Select Country</option>
                                                <option value="country-0">India</option>
                                                <option value="country-1">USA</option>
                                                <option value="country-2">Germany</option>
                                                <option value="country-3">England</option>
                                                <option value="country-4">South Afreca</option>
                                                <option value="country-5">France</option>
                                                <option value="country-6">Afganistan</option>
                                                <option value="country-7">Japan</option>
                                                <option value="country-8">Spouth Korea</option>
                                                <option value="country-9">China</option>
                                                <option value="country-10">Nepal</option>
                                                <option value="country-11">Bangladesh</option>
                                                <option value="country-12">Pakistan</option>
                                                <option value="country-13">Italy</option>
                                                <option value="country-14">Iran</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPincode">Pincode</label>
                                            <input type="text" class="form-control" id="inputPincode" name="pincode" placeholder="Pincode">
                                        </div>
                                    </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary px-5 py-2" name="submitData">Add Data</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add data End -->
        <!-- Customer Data Table Start-->
        <div class="table-vehicle">
            <table class="table table-striped">
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
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Radhe Sham</td>
                        <td>8956235689</td>
                        <td>radhe@gmail.com</td>
                        <td>Male</td>
                        <td class="dob">19/08/1996</td>
                        <td>1250, Dinkar Nagar, Nagpur-440010</td>
                        <td class="button-group">
                            <button type="button" class="btn btn-primary mr-1 mb-1" name="uploadData" data-toggle="modal" data-target="#customerModalEditForm"><i class="bi bi-pencil"></i></button>
                            <button type="button" class="btn btn-danger ml-1 mt-1" name="deleteData" data-toggle="modal" data-target="#customerDeleteModal"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Customer Data Table End-->
        <!-- Modal Update Data start-->
        <div class="modal fade" id="customerModalEditForm" tabindex="-1" aria-labelledby="customerModalEditForm" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerModalEditLabel">Edit Vehicle Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="formControlInput-1">Customer Name</label>
                                <input type="text" class="form-control" id="formControlInput-1" placeholder="Name" name="cname">
                            </div>
                            <div class="form-group">
                                <label for="formControlInput-2">Phone Number</label>
                                <input type="text" class="form-control" id="formControlInput-2" placeholder="Phone Number" name="mobile">
                            </div>
                            <div class="form-group">
                                <label for="formControlInput-3">Email</label>
                                <input type="email" class="form-control" id="formControlInput-3" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="formControlInput-4">Gender<lable>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="genderMale" name="gender" value="male">
                                            <label for="genderMale" class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="genderFemale" name="gender" value="female">
                                            <label for="genderFemale" class="form-check-label">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="genderOther" name="gender" value="other">
                                            <label for="genderOther" class="form-check-label">Other</label>
                                        </div>
                            </div>
                    </div>
                    <div class="form-group pt-3">
                        <label for="formControlInput-5">Date Of Birth</label>
                        <input type="date" class="form-control" Name="dob" id="formControlInput-5">
                    </div>
                    <div class="form-group">
                        <label for="formControlInput-6">Address</label>
                        <input type="text" class="form-control" id="formControlInput-6" name="address" placeholder="Address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity" name="city" placeholder="City">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">State</label>
                            <input type="text" class="form-control" id="inputState" name="state" placeholder="State">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCountry">State</label>
                            <select name="state" class="form-control" id="inputCountry">
                                <option selected>Select Country</option>
                                <option value="country-0">India</option>
                                <option value="country-1">USA</option>
                                <option value="country-2">Germany</option>
                                <option value="country-3">England</option>
                                <option value="country-4">South Afreca</option>
                                <option value="country-5">France</option>
                                <option value="country-6">Afganistan</option>
                                <option value="country-7">Japan</option>
                                <option value="country-8">Spouth Korea</option>
                                <option value="country-9">China</option>
                                <option value="country-10">Nepal</option>
                                <option value="country-11">Bangladesh</option>
                                <option value="country-12">Pakistan</option>
                                <option value="country-13">Italy</option>
                                <option value="country-14">Iran</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPincode">Pincode</label>
                            <input type="text" class="form-control" id="inputPincode" name="pincode" placeholder="Pincode">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary px-5 py-2" name="submitData">Add Data</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Update data End -->
    <!-- Modal Delete Data start-->
    <div class="modal fade" id="customerDeleteModal" tabindex="-1" aria-labelledby="VehicleDeleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4 class="h4">Are You Sure Delete Data</h4>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete Data End-->

    </div>
</body>

</html>