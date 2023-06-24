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
    .row{
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;

    }
</style>
<body>
    <div class="main-body">
        <div class="container">
        <h1>Welcome, <?php echo $userdata->name; ?></h1>
            <div class="row col-lg-12">
                <div class="col-lg-5">
                    <div class="profile-img">
                        <div class="edit"><button type="button" class="btn btn-primary mr-1 mt-1 edit-btn" name="uploadData"
                                      data-toggle="modal"
                                    data-target="#purchaseModalEditLabel"><i class="bi bi-pencil"></i></button></div>
                         <img src="Image/user/user-1.png" alt="Profile Pic" width="200" height="200">
                         <div class="modal fade" id="vehiclemodal_editform" tabindex="-1" aria-labelledby="vehicleModalEditForm"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="purchaseModalEditLabel">Edit Vehicle Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="vehicle_edit.php" method="POST" enctype="multipart/form-data" id="edit-form">
                            <input type="hidden" class="edit-id" name="id" id="edit-id">
                            <div class="form-group pt-3 pb-2">
                                <label for="imageInput-2" style="display:block;">Image</label>
                                <input type="file" class="form-control imageInput-2" Name="inputFile" id="imageInput-2"
                                    accept="image/*" value="">
                                <span class="img-upload"><img id="previewImage-1" src="" alt="Vehicle Image" width="100"
                                        height="60"></span>
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
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile-img">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>