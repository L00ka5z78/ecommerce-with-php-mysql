<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User registration form</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="insert name" autocomplete="off" required="required" name="user_username" />
                    </div>
                    <div class="form-outline  mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="insert valid email" autocomplete="off" required="required" name="user_email" />
                    </div>
                    <div class="form-outline  mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image" />
                    </div>

                    <div class="form-outline  mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="insert password" autocomplete="off" required="required" name="user_password" />
                    </div>
                    <div class="form-outline  mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required" name="conf_user_password" />
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="insert address" autocomplete="off" required="required" name="user_address" />
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="insert mobile number" autocomplete="off" required="required" name="user_contact" />
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold pt-2 mt-2 mb-0">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_register'])) {
    $user_username                  = $_POST['user_username'];
    $user_email                     = $_POST['user_email'];
    $user_password                  = $_POST['user_password'];

    $hash_password                  = password_hash($user_password, PASSWORD_DEFAULT);

    $conf_user_password             = $_POST['conf_user_password'];
    $user_address                   = $_POST['user_address'];
    $user_contact                   = $_POST['user_contact'];

    $user_image                     = $_FILES['user_image']['name'];
    $user_image_tmp                 = $_FILES['user_image']['tmp_name'];

    $user_ip                        = getIPAddress();

    //select query. this is what we do after writing insert query

    $select_query                   = "
        SELECT
         * 
         FROM
            `user_table` 
        WHERE 
            username = 
            '$user_username'
        OR 
            user_email =
            '$user_email'    
        ";
    $result                         = mysqli_query($con, $select_query);
    $rows_count                     = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('User or email already exist')</script>";
    } else if ($user_password != $conf_user_password)
        echo "<script>alert('Password does not match')</script>";


    else {
        //  *************    insert user. this we do first. **********************
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query                   = "
            INSERT 
            INTO 
                `user_table` 
                (username, 
                user_email, 
                user_password, 
                user_image, 
                user_ip, 
                user_address, 
                user_mobile
            ) 
            VALUES
                ('$user_username', 
                '$user_email', 
                '$hash_password', 
                '$user_image', 
                '$user_ip', 
                '$user_address', 
                '$user_contact')
            ";
        $sql_execute                    = mysqli_query($con, $insert_query);
    }

    // selecting cart items
    $select_cart_items                  = "
        SELECT 
        * 
        FROM 
            `cart_details` 
        WHERE 
            ip_address = 
            '$user_ip
        ";
    $result_cart                       = mysqli_query($con, $select_cart_items);
    $rows_count                        = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username']          = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";
    } else {
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}

?>