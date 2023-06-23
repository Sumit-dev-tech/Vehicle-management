<?php
include("header.php");
include("sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
</head>
<style>
    body {
        font-family: 'Montserrat', sans-serif;

    }

    nav.nav {
        position: fixed;
        left: 250px;
        width: calc(100% - 250px);
        top: 0;
        z-index: 100;
        box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        transition: left 0.3s ease;
    }

    .main-head h1 {
        color: #3d3d29;
        font-size: 2rem;
    }

    .main-head h1 span i {
        margin-right: 10px;
    }

    .main-head h1 span i:hover {
        cursor: pointer;
    }

    .search-bar {
        height: 40px;
        border: 1px solid #3d3d29;
        border-radius: 35px;
        padding: 7px 0 0 20px;
        width: 270px;
    }

    .search-bar input {
        border: none;
        color: #3d3d29;
        padding-left: 10px;
        outline: 0;
    }

    .search-bar span>i {
        cursor: pointer;
        color: #3d3d29;
    }

    .user-name h4.h4 {
        font-size: 18px;
    }

    .user-img img {
        border-radius: 50%;
    }

    @media only screen and (max-width: 1200px) {
        nav.nav {
            width: calc(100% - 70px);
            left: 70px;
        }
    }
    @media only screen and (max-width: 810px){
        nav.nav{
            width: 100%;
            left: 0;
            transition: 0.3s ease all;
        }
        nav.nav{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;

        }
        .main-head h1{
            font-size: 1.5em;
        }
        .search-bar{
            width: 200px;
            font-size: 15px;
        }
        .search-bar input{
            width: 150px;
        }
        .user-name h4.h4 {
        font-size: 16px;
    }
       
    }
</style>

<body>
    <nav class="nav navbar-light p-3">
        <div class="header d-flex justify-content-between w-100 align-item-center pt-3">
            <div class="main-head pl-3">
                <h1 class="h1">
                    <label for="nav-toggle"><span><i class="bi bi-list"></i></span></label>
                    Dashboard
                </h1>
            </div>
            <div class="search-bar">
                <form action="" method="GET">
                    <span><i class="bi bi-search"></i></span>
                    <input type="text" name="search" placeholder="Search here.." aria-label="search">
                </form>
            </div>
            <div class="user d-flex pr-3">
                <div class="user-img">
                    <img src="Image/user/user-1.png" alt="" width="40px">
                </div>
                <div class="user-name ml-3 mt-2">
                    <h4 class="h4">
                        <?php echo $userdata->name; ?>
                    </h4>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>