<?php
// include("../connection/conn.php");
include("header.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management|Dashboard</title>
</head>
<!-- Style for Dashboard-->
<style>
    body {
        background-color: #f5f5f5;
    }

    .main-body {
        transition: margin-left 0.3s ease;
        margin-left: 250px;
        margin-top: 70px;
        height: 100%;
        font-family: 'Montserrat', sans-serif;
        padding: 50px;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 30px;
        padding-top: 50px;
        padding-left: 50px;
    }

    .card-single {
        background: none;
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 350px;
        height: 200px;
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        padding: 10px;
        padding-right: 20px;

    }

    .card-single:hover {
        box-shadow: 0 5px 10px 0 rgba(31, 38, 135, 0.37);
        transform: scale3d(1.5);
        cursor: pointer;
    }

    .card-single .card-icon span i {
        font-size: 50px;
        background: -webkit-linear-gradient(left, #80b3ff, #0066ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    @media only screen and (max-width: 1200px) {
        .main-body {
            margin-left: 70px;
            width: calc(100% - 70px);
        }
    }

    @media only screen and (max-width:767px) {
        .cards {
            grid-template-columns: repeat(1, 1fr);
        }
    }
    @media only screen and (max-width: 810px){
        .main-body{
            width: 100% !important;
            margin-left: 0;
            transition: 0.3s ease all;
        }
    }
</style>

<body>
    <div class="main-body">
        <div class="cards">
            <div class="card-single ">
                <div class="card-body text-center">
                    <?php
                     $sql = "SELECT * FROM `tblmastercustomer`";
                     $result = mysqli_query($conn, $sql);
                     $row = mysqli_num_rows($result);
                    
                      echo '<h1 class="h1">'.$row.'</h1>'
                    ?>
                    <!-- <h1 class="h1">100</h1> -->
                    <span>
                        <h5>Total Customers</h5>
                    </span>
                </div>
                <div class="card-icon">
                    <span><i class="bi bi-people-fill"></i></span>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body text-center">
                <?php
                     $sql = "SELECT * FROM `tblmastervehicle`";
                     $result = mysqli_query($conn, $sql);
                     $row = mysqli_num_rows($result);
                    
                      echo '<h1 class="h1">'.$row.'</h1>'
                    ?>
                    <span>
                        <h5>Total Vehicle</h5>
                    </span>
                </div>
                <div class="card-icon">
                    <span><i class="bi bi-truck-front-fill"></i></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>