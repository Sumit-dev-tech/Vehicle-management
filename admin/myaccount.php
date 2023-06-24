<?php
include("header.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management | My Acoount</title>
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
        margin-top: 70px;
        width: calc(100% - 250px);
        padding: 50px;

    }

    .row {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .edit-btn {
        float: right;
    }
    .profile-img{
        width: 100%;
    }
    .btn-primary:not(:disabled):not(.disabled):active:focus {
        border: none;
        box-shadow: none;
    }
    .btn-primary{
        border: none;
        outline: 0;
        background-color:  #0066ff;
        font-size: 20px;
    }
    .btn-primary:focus {
        box-shadow: none;
        outline: 0;
        border: none;
    }
    .btn-primary:hover {
        background-color: #80b3ff;
        box-shadow: none;
    }
    @media only screen and (max-width: 1200px) {
        .main-body {
            margin-left: 70px;
            width: calc(100% - 70px);
        }
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
        <div class="container">
            <h1>Welcome,
                <?php echo $userdata->name; ?>
            </h1>
            <div class="row col-lg-12">
                <div class="col-lg-3">
                    <div class="profile-img">
                        <div class="edit-img"><button type="button" class="btn btn-primary mr-1 mt-1 edit-btn"
                                name="uploadData" data-toggle="modal" data-target="#purchasmodal_editform"><i class="bi bi-camera-fill"></i></button>
                            <div class="modal fade" id="purchasmodal_editform" tabindex="-1"
                                aria-labelledby="vehicleModalEditForm" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="purchaseModalEditLabel">Update Profile Image
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="vehicle_edit.php" method="POST" enctype="multipart/form-data"
                                                id="edit-form">
                                                <input type="hidden" class="edit-id" name="id" id="edit-id">
                                                <div class="form-group pt-3 pb-2">
                                                    <label for="imageInput-2" style="display:block;">Image</label>
                                                    <input type="file" class="form-control imageInput-2"
                                                        Name="inputFile" id="imageInput-2" accept="image/*" value="">
                                                    <span class="img-upload"><img id="previewImage-1" src=""
                                                            alt="Vehicle Image" width="100" height="60"></span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary px-5 py-2"
                                                        name="update_data" id="info_edit">Update
                                                        Data</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="Image/user/user-1.png" alt="Profile Pic" class="profile-img">
                        <div class="image-upload-btn pt-3">
                        <button type="button" class="btn btn-primary mr-1 mt-1 update-profile w-100"
                                name="uploadData" data-toggle="modal" data-target="#purchasmodal_editform"><i class="bi bi-camera-fill"></i> Upload Image</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="profile-img">

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>