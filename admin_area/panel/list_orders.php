<h3 class="text-center text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead>

        <?php
        $get_orders             = "
            SELECT * FROM `user_orders`
            ";
        $result                 = mysqli_query($con, $get_orders);
        $row_count              = mysqli_num_rows($result);
        echo "
        <tr>
            <th class='bg-info'>Sl no.</th>
            <th class='bg-info'>Due amount</th>
            <th class='bg-info'>Invoice number</th>
            <th class='bg-info'>Total products</th>
            <th class='bg-info'>Order date</th>
            <th class='bg-info'>Status</th>
            <th class='bg-info'>Delete</th>
        </tr>
    </thead>
    <tbody>
        ";
        if ($row_count == 0) {
            echo "<h2 class'bg-danger text-center mt-5'>No orders yet</h2>";
        } else {
            $number = 0;
            while ($row_data    = mysqli_fetch_assoc($result)) {
                $order_id       = $row_data['order_id'];
                $user_id        = $row_data['user_id'];
                $amount_due     = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date     = $row_data['order_date'];
                $order_status   = $row_data['order_status'];
                $number++;
                echo "
                <tr>
                <th class='bg-secondary text-light'>$number</th>
                <th class='bg-secondary text-light'>$amount_due</th>
                <th class='bg-secondary text-light'>$invoice_number</th>
                <th class='bg-secondary text-light'>$total_products</th>
                <th class='bg-secondary text-light'>$order_date</th>
                <th class='bg-secondary text-light'>$order_status</th>
                <td class='bg-secondary text-light'><a class='bg-secondary text-light' herf=''><i class='fa-solid fa-trash text-light'></i></a></td>           
                 </tr>

                ";
            }
        }
        ?>

        @TODO dodaj delete do tabeli

        </tbody>
</table>