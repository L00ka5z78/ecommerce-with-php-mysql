<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead>
        <tr class="text-center">
            <th class="bg-info">Sl No</th>
            <th class="bg-info">Category title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_cat             = "
            SELECT * FROM `categories`
            ";
        $result                 = mysqli_query($con, $select_cat);
        $number                 = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id        = $row['category_id'];
            $category_title     = $row['category_title'];
            $number++;

        ?>
            <tr class="text-center">
                <td class="bg-secondary text-light"><?php echo $number; ?></td>
                <td class="bg-secondary text-light"><?php echo $category_title; ?></td>
                <td class='bg-secondary text-light'><a href='index.php?edit_category=<?php echo $category_id  ?>' class='text-ligth'><i class='fa-solid fa-pen-to-square text-light'></i></a></td>
                <td class='bg-secondary text-light'><a href='index.php?delete_category=<?php echo $category_id  ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash text-light'></i></a></td>
            </tr>
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
                <h4>Are you sure you want to delete this category?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_category" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"><a href="index.php?delete_category=<?php echo $category_id ?> " class="text-light text-decoration-none">Yes</a></button>
            </div>
        </div>
    </div>
</div>