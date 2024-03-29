<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles/styles.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage details</h3>
        </div>
        <!-- 3 child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/pineapple.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">admin name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3 px-1">
                        <a href="panel/insert_product.php" class="nav-link text-light bg-info my-1">Insert products</a>
                    </button>
                    <button class="my-3 px-1">
                        <a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a>
                    </button>
                    <button class="my-3 px-1"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert categories</a></button>
                    <button class="my-3 px-1"><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View categories</a></button>
                    <button class="my-3 px-1"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert brands</a></button>
                    <button class="my-3 px-1"><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View brands</a></button>
                    <button class="my-3" px-1><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button class="my-3 px-1"><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button class="my-3 px-1"><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button class="my-3 px-1 "><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- 4 child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('panel/insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('panel/insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('panel/view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('panel/edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include('panel/delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('panel/view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('panel/view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('panel/edit_category.php');
            }
            if (isset($_GET['edit_brands'])) {
                include('panel/edit_brands.php');
            }
            if (isset($_GET['delete_category'])) {
                include('panel/delete_category.php');
            }
            if (isset($_GET['delete_brands'])) {
                include('panel/delete_brands.php');
            }
            ?>
        </div>


        <?php include("../includes/footer.php") ?>

        <!-- <div class="bg-info p-3 text-center footer">
            <p>All rights reserved Designed by me 2024</p>
        </div> -->
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>