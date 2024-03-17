<h3 class="text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead>

        <?php
        $get_payments             = "
            SELECT * FROM `user_payments`
            ";
        $result                 = mysqli_query($con, $get_payments);
        $row_count              = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class'text-danger text-center mt-5'>No payments yet</h2>";
        } else {
            echo "
            <tr>
                <th class='bg-info'>Sl no.</th>
                <th class='bg-info'>Invoice number</th>
                <th class='bg-info'>Amount</th>
                <th class='bg-info'>Payment mode</th>
                <th class='bg-info'>Order date</th>
                <th class='bg-info'>Delete</th>
            </tr>
        </thead>
        <tbody>
            ";
            $number = 0;
            while ($row_data        = mysqli_fetch_assoc($result)) {
                $order_id           = $row_data['order_id'];
                $payment_id         = $row_data['payment_id'];
                $amount             = $row_data['amount'];
                $invoice_number     = $row_data['invoice_number'];
                $payment_mode       = $row_data['payment_mode'];
                $date               = $row_data['date'];
                $number++;
        ?>
                <tr>
                    <th class='bg-secondary text-light'><?php echo $number ?></th>
                    <th class='bg-secondary text-light'><?php echo $invoice_number ?></th>
                    <!-- <th class='bg-secondary text-light'><?php echo $invoice_number ?></th> -->
                    <th class='bg-secondary text-light'><?php echo $amount ?></th>
                    <th class='bg-secondary text-light'><?php echo $payment_mode ?></th>
                    <th class='bg-secondary text-light'><?php echo $date ?></th>
                    <td class='bg-secondary text-light'><a href='index.php?delete_order=<?php echo $order_id ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash text-light'></i></a></td>
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
                <h4>Are you sure you want to delete this order?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"><a href="index.php?delete_order=<?php echo $order_id ?> " class="text-light text-decoration-none">Yes</a></button>
            </div>
        </div>
    </div>
</div>