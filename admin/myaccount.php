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

    input.form-control {
        border: 1px solid #D8C9C6;
        color: #262626;
        border-radius: 0;
        outline: 0;
        font-size: 15px;
        height: 40px;
        margin-bottom: 20px;
    }

    input.form-control::placeholder {
        color: #262626;
    }

    input.form-control:focus {
        box-shadow: none;
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
        font-size: 18px;
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

    #imageInput {
        width: 65%;
        display: inline;
    }

    .img-upload {
        width: 35%;
        display: inline;
        margin-left: 20px;
    }

    .btn-icon {
        border-radius: 50%;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #fff;
    }

    table tr td,
    th {
        font-size: 18px;
    }

    table tr td {
        font-weight: 500;
    }

    table {
        line-height: 2;
        margin-bottom: 20px;
    }

    table tr {
        background-color: #fff !important;
    }

    form label {
        font-weight: 700;
    }

    .edit-password {
        background-color: green;
    }

    .profile-img {
        border-radius: 50%;
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
        font-size: 18px;
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

    .cpassword-toggle {
        position: absolute;
        top: 27.5%;
        right: 25px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 25px;
        transition: 0.5 ease all;
        /* margin-right: 5px; */
    }

    .cpassword-toggle .closed-eye {
        display: none;
    }

    .show-cpassword .open-eye {
        display: none;
    }

    .show-cpassword .closed-eye {
        display: block;
    }

    .npassword-toggle {
        position: absolute;
        top: 63%;
        right: 25px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 25px;
        transition: 0.5 ease all;
    }

    .npassword-toggle .closed-eye {
        display: none;
    }

    .show-npassword .open-eye {
        display: none;
    }

    .show-npassword .closed-eye {
        display: block;
    }
    #errorContainer{
        color: red;
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
                <?php
                // $username = mysqli_real_escape_string($conn, $_POST['username']);
                $id = $userdata->adminId;
                $sql = "SELECT * FROM `tblmasteradmin` WHERE `adminId`=  '" . $id . "'";
                $result = mysqli_query($conn, $sql);
                if ($fetch = mysqli_fetch_object($result)) {
                    $name = $fetch->name;
                    $username = $fetch->username;
                    if ($fetch->profileimg == "") {
                        $path = 'User/user-1.png';
                    }
                    else {
                        $path = $fetch->profileimg;
                    }
                    ?>
                    <div class="col-lg-3">
                        <div class="profile-img">

                            <!-- <div class="edit-img"><button type="button"
                                    class="btn btn-primary mr-1 mt-1 update-btn btn-icon" name="uploadData"
                                    data-id="<?php echo $fetch->adminId; ?>" data-toggle="modal" data-target="#editImageForm"><i
                                        class="bi bi-camera-fill"></i></button>
                            </div> -->
                            <img src="Picture/<?php echo $path; ?>" alt="Profile Pic" class="profile-img">

                            <div class="image-upload-btn pt-3">
                                <button type="button" class="btn btn-primary mr-1 mt-1 update-btn w-100" name="uploadData"
                                    data-id="<?php echo $fetch->adminId; ?>" data-toggle="modal"
                                    data-target="#editImageForm"><i class="bi bi-camera-fill"></i> Upload
                                    Image</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="details pl-5">
                            <table class="table table-striped">
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>
                                        <?php echo $name; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td>
                                        <?php echo $username; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-primary w-100 edit-profile"
                                            name="edit-profile-btn" data-id="<?php echo $fetch->adminId; ?>"
                                            data-toggle="modal" data-target="#editProfileForm"><i class="bi bi-pencil"></i>
                                            Edit
                                            Profile</button></td>
                                    <td><button type="button" class="btn btn-primary w-100 edit-password"
                                            name="edit-profile-btn" data-id="<?php echo $fetch->adminId; ?>"
                                            data-toggle="modal" data-target="#editPasswordForm"><i class="bi bi-pencil"></i>
                                            Edit
                                            password</button></td>
                                </tr>
                            </table>


                        </div>

                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="modal-form">
                <!-- Modal form for Profile Image -->
                <div class="modal fade" id="editImageForm" tabindex="-1" aria-labelledby="editImageForm"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editImageLabel">Update Profile Image
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
                                        <input type="file" class="form-control imageInput" Name="profileImg"
                                            id="imageInput" accept="image/*" value="">
                                        <span class="img-upload"><img id="previewImage-1" src="" alt="Profile Image"
                                                width="100" height="100"></span>
                                        <div id="errorContainer"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary px-5 py-2" name="update-image"
                                            id="img_edit">Update
                                            Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal form for update profile -->
                <div class="modal fade" id="editProfileForm" tabindex="-1" aria-labelledby="editProfileForm"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProfileLabel">Edit Profile
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="myaccount-edit.php" method="POST">
                                    <input type="hidden" class="update-profile" name="profileId" id="profileDataId"
                                        value="">
                                    <div class="form-group">
                                        <label for="nameInput">Name</label>
                                        <input type="text" class="form-control" id="nameInput" placeholder="Name"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="usernameInput">Username</label>
                                        <input type="text" class="form-control" id="usernameInput"
                                            placeholder="Username" name="username">
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
                <!-- Modal form for update Password -->
                <div class="modal fade" id="editPasswordForm" tabindex="-1" aria-labelledby="editPasswordForm"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPasswordLabel">Change Password
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="password.php" method="POST">
                                    <input type="hidden" class="update-profile" name="profileId" id="profileDataId"
                                        value="">
                                    <div class="form-group">
                                        <label for="cpassword">Current Passsword</label>
                                        <input type="password" class="form-control password" id="cpassword"
                                            placeholder="Current Password" name="cpassword">
                                        <span class="cpassword-toggle" onclick="toggleOldPasswordVisibility()">
                                            <i class="bi bi-eye-slash-fill closed-eye"></i>
                                            <i class="bi bi-eye-fill open-eye"></i>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="npassword">New Password</label>
                                        <input type="password" class="form-control password" id="npassword"
                                            placeholder="New Password" name="npassword">
                                        <span class="npassword-toggle" onclick="toggleNewPasswordVisibility()">
                                            <i class="bi bi-eye-slash-fill closed-eye"></i>
                                            <i class="bi bi-eye-fill open-eye"></i>
                                        </span>
                                    </div>
                                    <div class="footer">
                                        <button type="submit" class="btn btn-primary w-100" name="update-password"
                                            id="update-password">Update
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
    <script>
        $(document).ready(function () {
            $('#imageInput').on('change', function () {
                var fileInput = $(this);
                var file = fileInput[0].files[0];

                // Check if a file is selected
                if (file) {
                    // Check file size (in bytes)
                    var fileSize = file.size;
                    var maxSize = 2 * 1024 * 1024; // 2MB

                    if (fileSize > maxSize) {
                        // Display an error message if the file size exceeds the limit
                        showError("File size should not exceed 2MB.");
                        fileInput.val(''); // Clear the file input field
                        return;
                    }

                    // Check file type
                    var fileType = file.type;
                    var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

                    if (!allowedTypes.includes(fileType)) {
                        // Display an error message if the file type is not supported
                        showError("Only JPG, PNG, and GIF files are supported.");
                        fileInput.val(''); // Clear the file input field
                        return;
                    }
                }

                // If the file passes validation or no file is selected, clear any previous error message
                clearError();
            });

            function showError(errorMessage) {
                // Display the error message in the errorContainer
                $('#errorContainer').text(errorMessage);
            }

            function clearError() {
                // Clear any previous error message from the errorContainer
                $('#errorContainer').text('');
            }
        });
        // Add eye button on toggle in current Password
        function toggleOldPasswordVisibility() {
            const oldPassword = document.getElementById("cpassword");
            const passwordToggle = document.querySelector(".cpassword-toggle");

            if (oldPassword.type === "password") {
                oldPassword.type = "text";
                passwordToggle.classList.add("show-cpassword");
            } else {
                oldPassword.type = "password";
                passwordToggle.classList.remove("show-cpassword");
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const oldPassword = document.getElementById("cpassword");
            const passwordToggle = document.querySelector(".cpassword-toggle");

            passwordToggle.style.display = "none";

            oldPassword.addEventListener("input", function () {
                if (this.value) {
                    passwordToggle.style.display = "block";
                } else {
                    passwordToggle.style.display = "none";
                }
            });
        });
        // Add eye button on toggle in New Password
        function toggleNewPasswordVisibility() {
            const newPassword = document.getElementById("npassword");
            const passwordToggle = document.querySelector(".npassword-toggle");

            if (newPassword.type === "password") {
                newPassword.type = "text";
                passwordToggle.classList.add("show-npassword");
            } else {
                newPassword.type = "password";
                passwordToggle.classList.remove("show-npassword");
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const newPassword = document.getElementById("npassword");
            const passwordToggle = document.querySelector(".npassword-toggle");

            passwordToggle.style.display = "none";

            newPassword.addEventListener("input", function () {
                if (this.value) {
                    passwordToggle.style.display = "block";
                } else {
                    passwordToggle.style.display = "none";
                }
            });
        });
        $(document).ready(function () {
            document.getElementById('imageInput').addEventListener('change', function () {
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
                // Fetch data via AJAX
                $.ajax({
                    url: 'myaccount-img-edit.php',
                    type: 'POST',
                    dataType: 'json',
                    // contentType:"appliction/json",
                    data: {
                        'imageId': imageId
                    },
                    success: function (responce) {
                        console.log(responce);
                        $('#profileId').val(responce.adminId);
                        if (responce.profileimg !== '') {
                            $("#previewImage-1").attr("src", "Picture/" + responce.profileimg);
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
            $('.edit-profile').click(function (e) {
                e.preventDefault();
                var profileId = $(this).data('id');
                // console.log(profileId);
                // Fetch data via AJAX
                $.ajax({
                    url: 'myaccount-data.php',
                    type: 'POST',
                    data: { 'profileId': profileId },
                    success: function (result) {
                        var data = JSON.parse(result);
                        console.log(result);
                        $('#profileDataId').val(data.adminId);
                        $('#nameInput').val(data.name);
                        $('#usernameInput').val(data.username);
                    },
                    error: function (e) {
                        console.log(e);
                        // Handle error if the AJAX request fails
                        console.log('Failed to fetch data.');

                    }

                });
            })
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