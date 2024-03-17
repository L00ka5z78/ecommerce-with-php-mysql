<h3 class="text-center text-success">All users</h3>
<table class="table table-bordered mt-5">
    <thead>

        <?php
        $get_users             = "
            SELECT * FROM `user_table`
            ";
        $result                 = mysqli_query($con, $get_users);
        $row_count              = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class'text-danger text-center mt-5'>No users yet</h2>";
        } else {
            echo "
            <tr>
                <th class='bg-info'>Sl no.</th>
                <th class='bg-info'>Username</th>
                <th class='bg-info'>Email</th>
                <th class='bg-info'>Avatar / image</th>
                <th class='bg-info'>Address</th>
                <th class='bg-info'>Mobile</th>
                <th class='bg-info'>Delete</th>
            </tr>
        </thead>
        <tbody>
            ";
            $number = 0;
            while ($row_data            = mysqli_fetch_assoc($result)) {
                $user_id                = $row_data['user_id'];
                $username               = $row_data['username'];
                $user_email             = $row_data['user_email'];
                $user_image             = $row_data['user_image'];
                $user_address           = $row_data['user_address'];
                $user_mobile            = $row_data['user_mobile'];
                $number++;
        ?>
                <tr>
                    <td class='bg-secondary text-light'><?php echo $number ?></td>
                    <td class='bg-secondary text-light'><?php echo $username ?></td>

                    <td class='bg-secondary text-light'><?php echo $user_email ?></td>
                    <td class='bg-secondary text-light'><img src='../../user_area/user_images/<?php echo $user_image ?> alt=' $username' class="product_img" /></td>
                    <td class='bg-secondary text-light'><?php echo $user_address ?></td>
                    <td class='bg-secondary text-light'><?php echo $user_mobile ?></td>
                    <td class='bg-secondary text-light'><a href='index.php?delete_user=<?php echo $user_id ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash text-light'></i></a></td>
                </tr>
        <?php
            }
        }
        ?>
        </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4>Are you sure you want to delete this user?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_users" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"><a href="index.php?delete_user=<?php echo $user_id ?> " class="text-light text-decoration-none">Yes</a></button>
            </div>
        </div>
    </div>
</div>