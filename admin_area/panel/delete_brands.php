<?php
if (isset($_GET['delete_brands'])) {
    $delete_brands                = $_GET['delete_brands'];
    // echo $delete_category;
    $delete_query                   = "
        DELETE 
        FROM 
            `brands` 
        WHERE 
            brand_id = 
            $delete_brands
        ";
    $result                         = mysqli_query($con, $delete_query);
    if ($result) {
        echo "<script>alert('Brand deleted')</script>";
        echo "<script>window.open('./index.php?view_brands', '_self')</script>";
    }
}
