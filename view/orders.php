<?php include '../view/admin-header.php'; ?>
<div class="py-5" style="margin-top: 80px;"> <!-- Adjust this margin as needed -->
   <div class="container">
      <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header bg-secondary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>View Order</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Invoice Number</th>
                                    <th>Customer Name</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("../controllers/order_controller.php");
                            $orders = getallOrdersController();

                            if ($orders) {
                               foreach ($orders as $order) {
                                ?>
                                    <tr>
                                        <td><?= $order['order_id'] ?></td>
                                        <td><?= $order['invoice_no'] ?></td>
                                        <td><?= $order['customer_name'] ?></td>
                                        <td><?= number_format($order['total_price'], 2) ?></td>
                                        <td><?= $order['order_date'] ?></td>
                                        <td><?= $order['order_status'] ?></td>
                                        <td>
                                            <a href="view-order.php?order_id=<?= $order['order_id'];?>" class="btn btn-primary">View details</a>
                                        </td>
                                    </tr>
                                <?php
                               }
                            } else {
                               echo "<tr><td colspan='7' class='text-center'>No orders available.</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
   </div>
</div>
<?php include '../view/adminfooter.php'; ?>
