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
    <title>Vehicle Management|Vehicle</title>
</head>
<!-- Style for Vehicle Table -->
<style>
    * {
        margin: 0;
        padding: 0;
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

    .table tr.thead th {
        border: none;
        background: #0000b3;
        text-align: center;
        color: #ffffff;
        border: 2px solid #f5f5f5;
    }

    .table tr.tbody th,
    .table tr.tbody td {
        background-color: #FFFFFF;
        text-align: center;
        border: 2px solid #f5f5f5;
        color: #3d3d29;
        vertical-align: middle;
        font-size: 15px;

    }

    .table tr.tbody td {
        font-weight: 500;

    }

    .addVehicleButton {
        margin-bottom: 20px;
        width: 100%;
        display: flex;
        /* display: flex; */
        justify-content: space-between;

    }
   .addVehicleButton input.form-control{
        margin-bottom: 0;
        border-radius: 5px;
        border: 1px solid #D8C9C6;
    }
   .addVehicleButton .btn-success{
        background-color: #0066ff;
        border: 0;
    }
    .addVehicleButton .btn-success:hover{
        background-color: #80b3ff;
        box-shadow: none;
        border: 0;
    }
    .addVehicleButton .btn-success:focus{
       box-shadow: none;
       border: none;
    }
    .addVehicleButton .btn:focus{
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
    .addVehicleButton a.btn-primary,
    button.btn-primary {
        background-color: #0066ff;
        border: none;
        outline: 0;
        box-shadow: none;
        font-size: 18px;
    }
    .addVehicleButton a.btn-primary:hover,
    button.btn-primary:hover {
        background-color: #80b3ff;
        box-shadow: none;
    }

    .addVehicleButton a.btn-primary:focus,
    button.btn-primary:focus {
        outline: 0;
        box-shadow: none;
        border: none;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus {
        border: none;
        box-shadow: none;
    }

    #vehicleModelForm {
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

    #VehicleDeleteModel {
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

    .btn-secondary:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    #VehicleDeleteModal {
        padding-top: 180px;
    }

    #imageInput-1,
    #imageInput-2 {
        width: 65%;
        display: inline;
    }

    .img-upload {
        width: 35%;
        display: inline;
        margin-left: 20px;
    }

    .img-upload #previewImage {
        display: none;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        display: none;
    }

    .popup-img {
        cursor: pointer;
    }

    .popup-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .popup-image-container img {
        max-height: 80vh;
        max-width: 80vw;
        object-fit: contain;
    }

    /* close button */
    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #fff;
        font-size: 30px;
        cursor: pointer;
    }

    @media only screen and (max-width: 1200px) {
        .main-body {
            margin-left: 70px;
            width: calc(100% - 70px);
        }
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

    @media only screen and (max-width: 810px){
        .main-body{
            width: 100%;
            margin-left: 0;
            transition: 0.5s ease all;
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
        <!-- Modal Add Data start-->
        <div class="modal fade" id="vehicleModalForm" tabindex="-1" aria-labelledby="vehicleModalForm"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vehicleModalLabel">Vehicle Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="vehicle_add.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="modalInput-1">Modal Number</label>
                                <input type="text" class="form-control" id="modalInput-1" placeholder="Model Number"
                                    name="modalNo">
                            </div>
                            <div class="form-group">
                                <label for="chassisInput-1">Chassis Number</label>
                                <input type="text" class="form-control" id="chassisInput-1" placeholder="Chassis Number"
                                    name="chassisNo">

                            </div>
                            <div class="form-group">
                                <label for="variantInput-1">Variant</label>
                                <select class="form-control" id="variantInput-1" placeholder="Select Variant"
                                    name="variant">
                                    <option value="Select Variant">Select Variant</option>
                                    <option value="Honda Activa 6G">Honda Activa 6G</option>
                                    <option value="Honda Hornet">Honda Hornet</option>
                                    <option value="Honda Shine">Honda Shine</option>
                                    <option value="Honda Leo">Honda Leo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="colorInput-1">Colour</label>
                                <select class="form-control" id="colorInput-1" placeholder="Select Color"
                                    name="color">
                                    <option value="Select Color">Select Color</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Red">Red</option>
                                    <option value="White">White</option>
                                    <option value="Black">Black</option>
                                </select>
                            </div>
                            <div class="form-group pt-3 pb-2">
                                <label for="imageInput-1" style="display:block;">Image</label>
                                <input type="file" class="form-control" name="inputFile" id="imageInput-1"
                                    accept="image/*">
                                <span class="img-upload"><img id="previewImage" src="" alt="Vehicle Image" width="100"
                                        height="60"></span>
                            </div>
                            <div class="form-group">
                                <label for="priceInput-1">Price</label>
                                <input type="text" class="form-control" id="priceInput-1" placeholder="0000$"
                                    name="price">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary px-5 py-2" name="submit_data">Add
                                    Data</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Add data End -->
          <!-- Button trigger modal -->
          <div class="addVehicleButton">
            <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true" data-toggle="modal"
                data-target="#vehicleModalForm">Add Vehicle</a>
                <form class="form-inline" action="" method="GET">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search" aria-label="Search"
                    id="search" onkeyup="searchFun()">
                <!-- <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button> -->
            </form>
        </div>
        <!-- Vehicle Data Table Start-->
        <div class="table-vehicle">
            <table class="table table-striped" id="customerTable">
                <tr class="thead">
                    <th scope="col">#</th>
                    <th scope="col">Model#</th>
                    <th scope="col">Chassis#</th>
                    <th scope="col">Variant</th>
                    <th scope="col">Color</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Option</th>
                </tr>
                <?php
                // $j=0;
                $query = "SELECT * FROM `tblmastervehicle` WHERE isDeleted='0'";
                $run = mysqli_query($conn, $query);
                $i = 1;
                while ($fetch = mysqli_fetch_object($run)) {
                    if ($fetch->imagePath == '') {
                        $path = 'demo-1.png';
                    }
                    else {
                        $path = $fetch->imagePath;
                    }
                    ?>
                    <tr class="tbody">
                        <th scope="row">
                            <?php echo $i; ?>
                        </th>
                        <td>
                            <?php echo $fetch->modalNo; ?>
                        </td>
                        <td>
                            <?php echo $fetch->chassisNo; ?>
                        </td>
                        <td>
                            <?php echo $fetch->variant; ?>
                        </td>
                        <td>
                            <?php echo $fetch->color; ?>
                        </td>
                        <td class="imgVehcle"><img class="popup-img" src="Picture/<?php echo $path; ?>" alt="Lighthouse"
                                width="80" height="50"></td>
                        <td>
                            <?php echo $fetch->price; ?>
                        </td>
                        <td class="button-group">
                            <a role="button" class="btn btn-primary mr-1 mt-1 edit-btn" name="uploadData"
                                data-id="<?php echo $fetch->vehicleId; ?>" data-toggle="modal"
                                data-target="#vehiclemodal_editform"><i class="bi bi-pencil"></i></a>
                            <a role="button" class="btn btn-danger mr-1 mt-1 delete-btn" name="deleteData"
                                data-id="<?php echo $fetch->vehicleId; ?>" data-toggle="modal"
                                data-target="#VehicleDeleteModal"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
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
        </div>
        <!-- Vehicle Data Table End-->
        <!-- Modal Update Data start-->
        <div class="modal fade" id="vehiclemodal_editform" tabindex="-1" aria-labelledby="vehicleModalEditForm"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="VehicleModalEditLabel">Edit Vehicle Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="vehicle_edit.php" method="POST" enctype="multipart/form-data" id="edit-form">
                            <input type="hidden" class="edit-id" name="id" id="edit-id">
                            <div class="form-group">
                                <label for="modalInput-2">Model Number</label>
                                <input type="text" class="form-control modalInput-2" id="modalInput-2"
                                    placeholder="Modal Number" name="modalNumber" value="">
                            </div>
                            <div class="form-group">
                                <label for="chassisInput-2">Chassis Number</label>
                                <input type="text" class="form-control chassisInput-2" id="chassisInput-2"
                                    placeholder="Chassis Number" name="chassisNumber" value="">
                            </div>
                            <div class="form-group">
                                <label for="variantInput-2">Variant</label>
                                <select class="form-control variantInput-2" id="variantInput-2"
                                    placeholder="Select Variant" name="variant" value="">
                                    <option value="Select Variant">Select Variant</option>
                                    <option value="Honda Activa 6G">Honda Activa 6G</option>
                                    <option value="Honda Hornet">Honda Hornet</option>
                                    <option value="Honda Shine">Honda Shine</option>
                                    <option value="Honda Leo">Honda Leo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="colorInput-2">Colour</label>
                                <select class="form-control colorInput-2" id="colorInput-2" placeholder="Select Color"
                                    name="color" value="">
                                    <option value="Select Color">Select Color</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Red">Red</option>
                                    <option value="White">White</option>
                                    <option value="Black">Black</option>
                                </select>
                            </div>
                            <div class="form-group pt-3 pb-2">
                                <label for="imageInput-2" style="display:block;">Image</label>
                                <input type="file" class="form-control imageInput-2" Name="inputFile" id="imageInput-2"
                                    accept="image/*" value="">
                                <span class="img-upload"><img id="previewImage-1" src="" alt="Vehicle Image" width="100"
                                        height="60"></span>
                            </div>
                            <div class="form-group">
                                <label for="priceInput-2">Price</label>
                                <input type="text" class="form-control priceInput-2" id="priceInput-2"
                                    placeholder="0000$" name="price" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary px-5 py-2" name="update_data"
                                    id="info_edit">Update
                                    Data</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Update data End -->
        <!-- Modal Delete Data start-->
        <div class="modal fade" id="VehicleDeleteModal" tabindex="-1" aria-labelledby="VehicleDeleteModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <form action="vehicle_delete.php" method="POST">
                            <input type="hidden" id="deleteId" name="delete">
                            <h4 class="h4">Are You Sure Delete Data</h4>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="deleteData" id="delete-1"><i
                                        class="bi bi-trash3 mr-1"></i>Delete</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Update Data End-->

    </div>
    <script type="text/javascript">
        // Search Vehicle Data
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
        // Image Overlay
        $(document).ready(function () {
            // Get the popup overlay and image
            const $overlay = $('<div class="overlay"></div>').hide();
            $('body').append($overlay);

            $('.popup-img').click(function () {
                const imageUrl = $(this).attr('src');
                const $popupImage = $('<div class="popup-image-container"><span class="close-button">&times;</span><img src="' + imageUrl + '" alt="Popup Image"></div>');

                $overlay.html($popupImage);
                $overlay.fadeIn();
            });

            $overlay.on('click', '.close-button', function () {
                $overlay.fadeOut();
            });
        });

        $(document).ready(function () {
            document.getElementById('imageInput-1').addEventListener('change', function () {
                var fileInput = this;
                var previewImage = document.getElementById('previewImage');

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'inline'; // Show the image preview
                    }

                    reader.readAsDataURL(fileInput.files[0]);
                } else {
                    previewImage.src = '';
                    previewImage.style.display = 'none'; // Hide the image preview
                }
            });
            document.getElementById('imageInput-2').addEventListener('change', function () {
                var fileInput = this;
                var previewImage = document.getElementById('previewImage-1');

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'inline'; // Show the image preview
                    }

                    reader.readAsDataURL(fileInput.files[0]);
                } else {
                    previewImage.src = '';
                    previewImage.style.display = 'none'; // Hide the image preview
                }
            });
            $('.delete-btn').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                $('#deleteId').val(id);

            });
            // console.log('Script executed');
            $('.edit-btn').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                // console.log(recordId);

                // Fetch data via AJAX
                $.ajax({
                    url: 'vehicle_edit.php',
                    type: 'POST',
                    dataType: 'json',
                    // contentType:"appliction/json",
                    data: {
                        'id': id
                    },
                    success: function (data) {
                        console.log(data);
                        $('#edit-id').val(data.vehicleId);
                        $('#modalInput-2').val(data.modalNo);
                        $('#chassisInput-2').val(data.chassisNo);
                        $('#variantInput-2').val(data.variant);
                        $('#colorInput-2').val(data.color);
                        $('#priceInput-2').val(data.price);
                        if (data.imagePath !== '') {
                            $("#previewImage-1").attr("src", "Picture/" + data.imagePath);
                        } else {
                            // Show default image
                            $("#previewImage-1").attr("src", "Picture/demo-1.png");
                        }
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