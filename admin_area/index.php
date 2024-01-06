<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/styles.css">
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
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">Insert products</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">View products</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">Insert categories</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">View categories</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">Insert brands</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">View brands</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="bg-info p-3 text-center footer">
            <p>All rights reserved Designed by me 2024</p>
        </div>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>