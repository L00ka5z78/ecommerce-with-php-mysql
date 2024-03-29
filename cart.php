<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website cart details</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/styles.css">
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid p-0">
                <img src="./images/logo.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                    </ul>

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

        <!-- fourth child table-->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <tbody>
                            <!-- php to display dynamic data  -->
                            <?php
                            // global $con;
                            $get_ip_add                         = getIPAddress();
                            $total_price                        = 0;
                            $cart_query                         = "
                            SELECT 
                            * 
                            FROM 
                                `cart_details` 
                            WHERE 
                                ip_address = 
                                '$get_ip_add'
                            ";
                            $result                             = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo " <thead>
                                        <tr>
                                            <th>Product Title</th>
                                            <th>Product Image</th>
                                            <th>Quantity </th>
                                            <th>Total Price</th>
                                            <th>Remove</th>
                                            <th colspan='2'>Operations</th>
                                        </tr>
                                        </thead>
                                        </tbody>";
                                while ($row                         = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];
                                    $select_products                = "
                            SELECT 
                            * 
                            FROM 
                                `products` 
                            WHERE 
                                product_id = 
                                '$product_id'
                            ";
                                    $result_product                 = mysqli_query($con, $select_products);
                                    while ($row_product_price       = mysqli_fetch_array($result_product)) {
                                        $product_price              = array($row_product_price['product_price']);

                                        $price_table                = $row_product_price['product_price'];

                                        $product_title              = $row_product_price['product_title'];
                                        $product_image1             = $row_product_price['product_image1'];

                                        $product_values             = array_sum($product_price);
                                        $total_price                += $product_values;

                            ?>

                                        <tr>
                                            <td><?php echo $product_title ?></td>
                                            <td><img class=" cart_img" src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="123"></td>
                                            <td><input type="text" class="form-input w-50" name="qty"></td>

                                            <?php
                                            $get_ip_add                             = getIPAddress();
                                            if (isset($_POST['update_cart'])) {
                                                $quantities                         = $_POST['qty'];
                                                $update_cart                        = "
                                                UPDATE 
                                                    `cart_details`
                                                SET
                                                    quantity =
                                                    $quantities  
                                                WHERE
                                                    ip_address = '$get_ip_add' 
                                                ";
                                                $result_product_quantity            = mysqli_query($con, $update_cart);
                                                $total_price                        = $total_price * $quantities;
                                            }

                                            ?>
                                            <td><?php echo $price_table ?>/-</td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                            <td>
                                                <input class="bg-info px-3 py-2 mx-3 border-0" type="submit" value="Update Cart" name="update_cart">

                                                <input class="bg-info px-3 py-2 mx-3 border-0" type="submit" value="Remove Cart" name="remove_cart">
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            } else {
                                echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                            }
                            ?>

                    </table>
                    <!-- subtotal  -->
                    <div class="d-flex mb-5">

                        <?php
                        $get_ip_add                         = getIPAddress();
                        $cart_query                         = "
                            SELECT 
                            * 
                            FROM 
                                `cart_details` 
                            WHERE 
                                ip_address = 
                                '$get_ip_add'
                            ";
                        $result                             = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "      <h4 class='px-3'>Subtotal: <strong class='text-info'>$total_price/-</strong></h4>
                            <input class='bg-info px-3 py-2 mx-3 border-0' type='submit' value='Continue Shopping' name='continue_shopping'>                        
                            <button class='bg-secondary p-3 py-2 border-0'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>
                           ";
                        } else {
                            echo "<input class='bg-info px-3 py-2 mx-3 border-0' type='submit' value='Continue Shopping' name='continue_shopping'>";
                        }

                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php', '_self')</script>";
                        }


                        ?>
                        <!-- changed path inside button ABOVE to make app work in diffrent places. 28.01.24 08:21 -->
                    </div>

            </div>
        </div>
        </form>
        <!-- function to remove items  -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query           = "
                        DELETE 
                        FROM 
                            `cart_details` 
                        WHERE 
                            product_id = 
                            '$remove_id'    
                        ";
                    $run_delete             = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();

        ?>


        <?php include('./includes/footer.php') ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>