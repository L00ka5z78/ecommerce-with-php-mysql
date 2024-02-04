<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome <?php echo $_SESSION['username'] ?></title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles/styles.css">
    <style>
        /* body {
            overflow-x: hidden;
        } */

        /* .profile_img {
            width: 100%;
            height: 100%;
        } */
    </style>
</head>

<body>
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid p-0">
                <img src="../images/logo.jpg" alt="" class="logo" style="width: 45px; height:45px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>-/</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light mx-2" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <!-- calling cart function  -->
        <?php
        cart()
        ?>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php

                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome guest</a>    
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
                    </li>";
                }


                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./user_area/user_login.php'>Login</a>    
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/logout.php'>Logout</a>
                    </li>";
                }
                ?>

            </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden store</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>
        </div>
        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height: 100vh;">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your profile</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <img src="../images/jb.jpg" alt="" class="profile_img my-4">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            Pending orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            Edit account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            My orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            Delete account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10"></div>
        </div>




        <?php include('../includes/footer.php') ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>