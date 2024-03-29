<h3 class="text-center text-success">All products</h3>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th class="bg-info">Product ID</th>
            <th class="bg-info">Product Title</th>
            <th class="bg-info">Product Image</th>
            <th class="bg-info">Product Price</th>
            <th class="bg-info">Total Sold</th>
            <th class="bg-info">Status</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_products                       = "
            SELECT
            *
            FROM
                `products`
            ";
        $result                             = mysqli_query($con, $get_products);
        $number                             = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id                     = $row['product_id'];
            $product_title                  = $row['product_title'];
            $product_image1                 = $row['product_image1'];
            $product_price                  = $row['product_price'];
            $status                         = $row['status'];
            $number++;
        ?>
            <!-- echo " -->
            <tr class='text-center'>
                <td class='bg-secondary text-light'><?php echo $number; ?></td>
                <td class='bg-secondary text-light'><?php echo $product_title; ?></td>
                <td class='bg-secondary text-light'><img src='./product_images/<?php echo $product_image1; ?>' class='product_img' /></td>
                <td class='bg-secondary text-light'><?php echo $product_price; ?>/-</td>
                <td class='bg-secondary text-light'>
                    <?php
                    $get_count              = "
                        SELECT
                        *
                        FROM
                            `orders_pending`
                        WHERE
                            product_id = $product_id
                        ";
                    $result_count           = mysqli_query($con, $get_count);
                    $rows_count             = mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?>
                </td>
                <td class='bg-secondary text-light'><?php echo $status; ?></td>
                <td class='bg-secondary text-light'><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-ligth'><i class='fa-solid fa-pen-to-square text-light'></i></a></td>
                <td class='bg-secondary text-light'><a href='index.php?delete_product=<?php echo $product_id ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash text-light'></i></a></td>
            </tr>
            <!-- "; -->
        <?php
        }
        ?>

    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4>Are you sure you want to delete this product?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_products" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"><a href="index.php?delete_product=<?php echo $product_id ?> " class="text-light text-decoration-none">Yes</a></button>
            </div>
        </div>
    </div>
</div>