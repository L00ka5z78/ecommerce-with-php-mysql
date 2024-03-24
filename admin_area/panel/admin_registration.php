<?php
include('../../includes/connect.php');
include('../../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin registration</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../styles/styles.css">
</head>

<body>
    <div class="container-flui m-3">
        <h2 class="text-center mb-5">Admin registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../../images/admin.jpg" alt="admin reg" class="image-fluid admin_reg_img">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" name="admin_username" placeholder="Insert your name..." required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Insert valid email..." required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password..." required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password..." required class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Have account already?
                            <a href="admin_login.php" class="link-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['admin_registration'])) {
    $admin_username         = $_POST['admin_username'];
    $admin_email            = $_POST['email'];
    $admin_password         = $_POST['password'];
    $conf_admin_password    = $_POST['confirm_password'];

    if ($admin_password != $conf_admin_password) {
        echo "<script>alert('Password does not match')</script>";
    } else {
        $hash_password      = password_hash($admin_password, PASSWORD_DEFAULT);

        $select_query       = "
            SELECT 
            * 
            FROM 
                `admin_table` 
            WHERE 
                admin_name = 
                '$admin_username' 
            OR 
                admin_email = 
                '$admin_email'
            ";
        $result             = mysqli_query($con, $select_query);
        $rows_count         = mysqli_num_rows($result);

        if ($rows_count > 0) {
            echo "<script>alert('Name or email already exists')</script>";
        } else {
            $insert_query = "
                INSERT 
                INTO 
                    `admin_table` (
                    admin_name, 
                    admin_email, 
                    admin_password
                ) VALUES (
                    '$admin_username', 
                    '$admin_email', 
                    '$hash_password'
                )";
            $sql_execute    = mysqli_query($con, $insert_query);

            if ($sql_execute) {
                echo "<script>alert('Registration successful')</script>";
                echo "<script>window.open('../index.php', '_self')</script>";
            } else {
                echo "<script>alert('Registration failed')</script>";
            }
        }
    }
}
