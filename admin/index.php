<?php
session_start();
include("conn.php");
// include('session.php');
ob_start();
if (isset($_SESSION['user_data'])) {
    header("location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Fontawsome -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/> -->
    <title>Vehicle Management|Admin</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');

    body {
        height: 100vh;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: url("Image/bg-admin-1.jpg") rgba(0, 0, 0, 0.5);
        /* background-color: blue; */
        /* background-color: #002266; */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-blend-mode: overlay;
        font-family: 'Montserrat', sans-serif;
        color: #fff;
    }
    .d-flex {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
    }

    .card-img-top {
        max-width: 100%; 
        width: 70%;
        position: relative;
        margin-top: -50px;
        margin-bottom: 20px;
    }

    .card {
        border: 0;
        background-color: transparent;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
    }

    h2.h2 {
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 30px;
    }

    .form-group input {
        margin-bottom: 5px;
        background: none;
        color: #ffffff;
        border: 0;
        outline: 0;
        box-shadow: none;
        transition: none;
        padding-left: 40px;
    }

    .form-group input:focus {
        background: none;
        border: 0;
        transition: none;
        color: #fff;
        box-shadow: none;
    }

    .form-group input::placeholder {
        color: #fff;
    }

    .form-group {
        border-bottom: 1px solid #fff;
    }

    button.btn {
        width: 100%;
        border: 0;
        font-weight: 700;
        outline: 0;
        box-shadow: none;
        transition: none;
    }

    button.btn:hover {
        border: none;
        box-shadow: none;
        transition: none;
    }

    button.btn:focus {
        box-shadow: none;
        transition: none;
        border: none;
    }

    .form-group {
        display: block;
        /* flex-direction: row;
        align-items: center;
        justify-content: center; */
        color: #ffffff;
        position: relative;
    }

    span>i.bi-person-circle {
        font-size: 25px;
        color: #ffffff;
        display: inline;
        position: absolute;
        top: 20;
        left: 20;
        z-index: 1;
        /* margin-left: 5px; */
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 25px;
        transition: 0.5 ease all;
        /* margin-right: 5px; */
    }

    .closed-eye {
        display: none;
    }

    .show-password .open-eye {
        display: none;
    }

    .show-password .closed-eye {
        display: block;
    }

    span>i.bi-key {
        font-size: 25px;
        color: #ffffff;
        z-index: 1;
        display: inline;
        position: absolute;
        top: 20;
        left: 20;
        /* margin-left: 5px; */
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    input:-internal-autofill-selected {
        background-color: transparent !important;
    }

    .alert-success {
        color: white;
        background-color: green;
    }

    /* .alert-danger {
        
    } */
</style>

<body>
    <!-- PHP code Start -->
    <?php
    // $message = "";
    // if (isset($_POST['login_btn'])) {
    //     $uname = $_POST['username'];
    //     $pass = md5($_POST['password']);
    //     // echo $pass;
    //     $sql = "SELECT * FROM `tblmasteradmin` WHERE `username` = '" . $uname . "' AND `password` = '" . $pass . "'";
    //     $query = mysqli_query($conn, $sql);
    //     $fetch = mysqli_fetch_assoc($query);
    //     if (mysqli_num_rows($query) > 0) {
    //         session_start();
    //         $_SESSION['user_data'] = json_encode($fetch);
    //         header('location: dashboard.php');
    //         if(isset($_SESSION['user_data'])){
    //             header('location: dashboard.php');
    //         }
    //         echo $_session['user_data'];
    //         $message = '<div class="alert alert-success">Login Successfull</div>';
    //         // header('location: dashboard.php');
    //     }
    //     else {
    //         $message = '<div class="alert alert-danger">Incorrect 
    //         username and Password</div>';
    
    //     }
    // }
    $message = "";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST['login_btn'])) {
        $uname = $_POST['username'];
        $pass = md5($_POST['password']);
        $sql = "SELECT * FROM `tblmasteradmin` WHERE `username` = '" . $uname . "' AND `password` = '" . $pass . "'";
        $query = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_assoc($query);
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['user_data'] = json_encode($fetch);
            $message = '<div class="alert alert-success">Login Successfull</div>';
            // function function_alert($message) {
            //     echo "<script>alert('$message');</script>";
            //    }
            //    function_alert("Welcome to Geeks for Geeks");
            header("location:dashboard.php");
            exit;
        }
        else {
            $message = '<div class="alert alert-danger">Incorrect Username and Password</div>';
        }
    }
    ?>
    <!-- PHP code End -->
    <!-- HTMl Code -->
    <div class="admin-login">
        <?php echo $message; ?>
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <div class="card col-xl-4 col-lg-4 col-md-4 p-5">
                    <img src="Image/logo/logo-12.png" alt="" class="card-img-top mx-auto">
                    <div class="row align-items-center justify-content-center">
                        <div class="text-center mb-2">
                            <h2 class="h2 text-center">Admin login</h2>
                        </div>
                        <form action="" class="mt-3" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <span><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                    name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <span><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control form-control-password"
                                    id="exampleInputPassword" name="password" placeholder="Password">
                                <span class="password-toggle" onclick="togglePasswordVisibility()">
                                    <i class="bi bi-eye-slash-fill closed-eye"></i>
                                    <i class="bi bi-eye-fill open-eye"></i>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary" name="login_btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
    </script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("exampleInputPassword");
            const passwordToggle = document.querySelector(".password-toggle");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.classList.add("show-password");
            } else {
                passwordInput.type = "password";
                passwordToggle.classList.remove("show-password");
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("exampleInputPassword");
            const passwordToggle = document.querySelector(".password-toggle");

            passwordToggle.style.display = "none";

            passwordInput.addEventListener("input", function () {
                if (this.value) {
                    passwordToggle.style.display = "block";
                } else {
                    passwordToggle.style.display = "none";
                }
            });
        });


    </script>

</body>

</html>