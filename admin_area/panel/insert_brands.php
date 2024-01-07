<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title                = $_POST['brand_title'];

    //select data from db
    $select_query               = "
        SELECT 
        *
        FROM  
            `brands` 
        WHERE 
            brand_title = 
            '$brand_title'
        ";
    $result_select              = mysqli_query($con, $select_query);
    $number                     = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This brand is already present in database')</script>";
    } else {
        $insert_query           = "
            INSERT 
            INTO 
                `brands` 
                (brand_title) 
            VALUES 
            ('$brand_title')
            ";
        $result                 = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been added successfully')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" name="brand_title" class="form-control" placeholder="Insert Brands" aria-label="brands">
    </div>
    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" name="insert_brand" class="p-2 my-3 border-0 bg-info" value="Insert Brands">
    </div>
</form>