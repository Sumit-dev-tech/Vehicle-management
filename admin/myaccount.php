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

    .profile-img {
        width: 100%;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus {
        border: none;
        box-shadow: none;
    }

    .btn-primary {
        border: none;
        outline: 0;
        background-color: #0066ff;
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
    #imageInput-2{
        width: 65%;
        display: inline;
    }
    .img-upload {
        width: 35%;
        display: inline;
        margin-left: 20px;
    }
    .btn-icon{
        border-radius: 50%;
    }


    @media only screen and (max-width: 1200px) {
        .main-body {
            margin-left: 70px;
            width: calc(100% - 70px);
        }
    }

    @media only screen and (max-width: 810px) {
        .main-body {
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
        <div class="container">
            <h1>Welcome,
                <?php echo $userdata->name; ?>
            </h1>
            <div class="row col-lg-12 pt-5">
                <div class="col-lg-3">
                    <div class="profile-img">
                        <div class="edit-img"><button type="button" class="btn btn-primary mr-1 mt-1 update-btn btn-icon"
                                name="uploadData" data-id="<?php echo $userdata->adminId; ?>" data-toggle="modal" data-target="#purchasmodal_editform"><i
                                    class="bi bi-camera-fill"></i></button>
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
                                            <form action="myaccount-img-edit.php" method="POST" enctype="multipart/form-data"
                                                id="edit-form">
                                                <input type="hidden" class="update-profileId" name="profileId" id="profileId">
                                                <div class="form-group pt-3 pb-2">
                                                    <input type="file" class="form-control imageInput-2"
                                                        Name="profileImg" id="imageInput-2" accept="image/*" value="">
                                                    <span class="img-upload"><img id="previewImage-1" src=""
                                                            alt="Profile Image" width="100" height="100"></span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary px-5 py-2"
                                                        name="update-image" id="img_edit">Update
                                                        Data</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                         if($userdata->profileimg == ""){
                             $path = 'User/user-1.png';
                         }else{
                            $path = $userdata->profileimg;
                         }
                         $_SESSION['profile_img'] = $path;
                        ?>
                        <img src="Picture/<?php echo $_SESSION['profile_img'] ;?>" alt="Profile Pic" class="profile-img">
                        
                        <div class="image-upload-btn pt-3">
                            <button type="button" class="btn btn-primary mr-1 mt-1 update-btn w-100"
                                name="uploadData" data-id="<?php echo $userdata->adminId; ?>" data-toggle="modal" data-target="#purchasmodal_editform"><i
                                    class="bi bi-camera-fill"></i> Upload Image</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="details pl-5">
                        <form action="myaccount-data.php" method="post">
                            <input type="hidden" class="update-profile" name="profileDataId" id="profileDataId" value="<?php echo $userdata->adminId; ?>">
                            <div class="form-group">
                                <label for="nameInput">Name</label>
                                <input type="text" class="form-control" id="nameInput" placeholder="Name" name="name" value="<?php echo $userdata->name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="usernameInput">Username</label>
                                <input type="text" class="form-control" id="usernameInput" placeholder="Username"
                                    name="username" value="<?php echo $userdata->username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="usernameInput">Change Password</label>
                                <input type="password" class="form-control" id="passwordInput" placeholder="Password"
                                    name="password" value="<?php echo $userdata->password; ?>">
                            </div>
                            <div class="footer">
                                <button type="submit" class="btn btn-primary w-100" name="update-profile"
                                    id="update-profile">Update
                                    Profile</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
          $(document).ready(function () {
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
            $('.update-btn').click(function (e) {
                e.preventDefault();
                var imageId = $(this).data('id');
                // console.log(recordId);

                // Fetch data via AJAX
                $.ajax({
                    url: 'myaccount-img-edit.php',
                    type: 'POST',
                    dataType: 'json',
                    // contentType:"appliction/json",
                    data: {
                        'imageId' : imageId
                    },
                    success: function (responce) {
                        console.log(responce);
                        $('#profileId').val(responce.adminId);
                        if (responce.profileimg !== '') {
                            $("#previewImage-1").attr("src", "Picture/User/" + responce.profileimg);
                        } else {
                            // Show default image
                            $("#previewImage-1").attr("src", "Picture/User/user-1.png");
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
//           $(document).ready(function() {
//   // Ajax request to fetch data
//   $.ajax({
//     url: 'myaccount-data.php',  // Replace with your backend script URL
//     type: 'Post',  // Use GET or POST based on your backend implementation
//     data: formData,
//     success: function(data) {
//       // Populate form fields with fetched data
//       $('#name').val(data.name);
//       $('#nameInput').val(data.username);
//       $('#passwordInput').val(data.password);
//     },
//     error: function(xhr, status, error) {
//       // Handle error case
//       console.error(error);
//     }
//   });
// });

    </script>
</body>

</html>