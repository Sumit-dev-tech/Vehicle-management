<?php
include("header.php");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// echo $_SERVER['REQUEST_URI'];
function checkNavbar($className)
{
    // die();
    if (strpos($_SERVER['REQUEST_URI'], $className)) {
        return ' active';
    }
    return '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Sidebar</title> -->
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        background: linear-gradient(45deg, #80b3ff 0%, #0066ff 100%);
        position: fixed;
        left: 0;
        top: 0;
        z-index: 100;
        transition: width 0.3s ease;

    }

    .sidebar .sidebar-brands img {
        transition: width ease 0.3s;
    }

    .sidebar-menu ul {
        margin-top: 20px;
    }

    .sidebar-menu li.list-group-item {
        padding: 0;
        border: none;
        background: none;
        margin-bottom: 20px;
        width: 100%;
        padding-left: 20px;
        border: 0;
        outline: 0;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .sidebar-menu li.list-group-item a{
        padding-top: 5px;
        padding-bottom: 5px;
    }
    

    .sidebar-menu li.list-group-item:hover a {
        background-color: #f5f5f5;
        color: #1a1fb8;
        /* padding-top: 5px;
        padding-bottom: 5px; */
        border-radius: 50px 0 0 50px;
        border: 0;
        outline: 0;
    }

    .sidebar-menu li.list-group-item.active a {
        background-color: #f5f5f5;
        color: #1a1fb8;
        padding-top: 5px;
        padding-bottom: 5px;
        border-radius: 50px 0 0 50px;
        border: 0;
        outline: 0;
    }

    .sidebar-menu ul.list-group li a {
        position: relative;
        display: block;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        padding-left: 20px;
    }

    .sidebar-menu ul.list-group li.icon {
        position: relative;
    }

    /* .sidebar-menu ul.list-group li:first-child {
        font-size: 25px;
    } */

    .sidebar-menu ul.list-group li a:hover {
        text-decoration: none;
        color: #1a1fb8;
    }

    .sidebar-menu ul.list-group li a span:first-child {
        padding-right: 10px;
        font-size: 25px;
    }

    #nav-toggle:checked+.sidebar {
        width: 70px;
    }

    #nav-toggle:checked+.sidebar .sidebar-brands img {
        width: 60px;
        padding: 0;
        margin-left: -40px;
        margin-right: 20px;
    }

    #nav-toggle:checked+.sidebar .sidebar-menu ul li a span:last-child {
        display: none;
    }

    #nav-toggle:checked+.sidebar .sidebar-menu ul li {
        padding-left: 10px;
        text-align: center;
    }

    #nav-toggle:checked+.sidebar .sidebar-menu ul li a {
        padding-left: 0;
    }

    #nav-toggle:checked~.main-body {
        margin-left: 70px;
        width: calc(100% - 70px);
    }

    #nav-toggle:checked~nav.nav {
        width: calc(100% - 70px);
        left: 70px;
    }

    @media only screen and (max-width: 1200px) {
        .sidebar {
            width: 70px;
        }

        .sidebar .sidebar-brands img {
            visibility: hidden;
        }

        .sidebar .sidebar-menu ul li a span:last-child {
            display: none;
        }

        .sidebar .sidebar-menu ul li {
            padding-left: 10px;
            text-align: center;
        }

        .sidebar .sidebar-menu ul li a {
            padding-left: 0;
        }
    }
    @media only screen and (max-width: 810px){
        .sidebar{
            display: inline-block;
            width: 0 ;
            overflow: hidden;
            transform: translateX(-20px);
            z-index: 150;
            transition: all ease .3s;
        }
        #nav-toggle:checked+.sidebar{
            display: inline-block;
           overflow: hidden;
            width: 70px;
            transform: translateX(0);
            transition: all ease .3s;
        }
    }
    input[type="checkbox"]{
        visibility: hidden;
    }
   
</style>
<?php
// echo checkNavbar('dashboard'); 
?>

<body>
    <input type="checkbox" class="nav-toggle" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brands mx-auto px-5 ml-3 mb-2">
            <img src="Image/logo/logo-12.png" alt="" width="150px">
        </div>
        <div class="sidebar-menu">
            <ul class="list-group" id="sidbar-content">
                <li class="list-group-item <?php echo checkNavbar('dashboard'); ?>">
                    <a href="dashboard.php" class="list-item"> <span class="icon"><i class="bi bi-speedometer2"></i></span>
                        <span class="title">Dashboard</span></a>
                </li>
                <li class="list-group-item <?php echo checkNavbar('vehicle'); ?>">
                    <a href="vehicle.php" class="list-item"><span class="icon"><i class="bi bi-truck-front"></i></span>
                        <span class="title">Vehicle</span></a>
                </li>
                <li class="list-group-item <?php echo checkNavbar('customer'); ?>">
                    <a href="customer.php" class="list-item"><span class="icon"><i class="bi bi-people"></i></span>
                        <span class="title">Customer</span></a>
                </li>
                <li class="list-group-item <?php echo checkNavbar('purchase'); ?>">
                    <a href="purchase.php" class="list-item"><span class="icon"><i class="bi bi-bag"></i></span>
                        <span class="title">Purchase Data</span></a>
                </li>
                <li class="list-group-item <?php echo checkNavbar('myaccount'); ?>">
                    <a href="myaccount.php" class="list-item"><span class="icon"><i class="bi bi-gear-fill"></i></span>
                        <span class="title">Setting</span></a>
                </li>
                <li class="list-group-item">
                    <a href="logout.php" class="list-item"><span class="icon"><i class="bi bi-power"></i></span>
                        <span class="title">Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        // function hasClass(element, className) {
        //     return (' ' + element.className + ' ').indexOf(' ' + className + ' ') > -1;
        // }
        // // Add active class in selective items
        // let list = document.querySelectorAll('.list-group-item');
        // var currentUrl = window.location.href;


        // function activeLink() {
        //     list.forEach((item) => {
        //             if (currentUrl.includes('vehicle')) {
        //                 console.log(item.classList.contains('vehicle'))
        //             }
        //             console.log(currentUrl)
        //             console.log(item.classList)
        //         }

        //     );
        // }
        // list.forEach((item) =>
        //     item.addEventListener('mouseover', activeLink));
        // let list = document.querySelectorAll('.list-group-item');

        // function activeLink() {
        //     list.forEach((item) =>
        //         item.classList.remove('active'));
        //     item.classList.add('active');
        // }
        // list.forEach((item) =>
        //     item.addEventListener('mouseover', activeLink));
    </script>
</body>

</html>