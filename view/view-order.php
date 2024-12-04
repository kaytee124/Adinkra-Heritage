<?php include '../view/admin-header.php'; ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card Header with Grey Background -->
                    <div class="card-header bg-secondary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>View Order</span>
                            <a href="orders.php" class="btn btn-warning">
                                <i class="fa fa-reply"></i> Back
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <?php
                                require_once("../classes/order_class.php");
                                require_once("../controllers/order_controller.php");

                                // Get order_id from the URL
                                $order_id = $_GET['order_id'] ?? null;

                                if ($order_id) {
                                    // Fetch order details
                                    $orderDetails = getOrderDetailsController($order_id);

                                    if ($orderDetails) {
                                        $cid = $orderDetails['customer_id'];
                                        // Fetch customer details
                                        $customerDetails = getCustomerDetailsController($cid);

                                        if ($customerDetails) {
                                            echo "
                                            <div class='row'>
                                                <div class='col-md-6 mb-3'>
                                                    <label class='fw-bold' for='customer_name'>Name</label>
                                                    <input type='text' id='customer_name' class='form-control' value='{$customerDetails['customer_name']}' readonly>
                                                </div>
                                                <div class='col-md-6 mb-3'>
                                                    <label class='fw-bold' for='customer_email'>Email</label>
                                                    <input type='text' id='customer_email' class='form-control' value='{$customerDetails['customer_email']}' readonly>
                                                </div>
                                                <div class='col-md-6 mb-3'>
                                                    <label class='fw-bold' for='customer_contact'>Phone</label>
                                                    <input type='text' id='customer_contact' class='form-control' value='{$customerDetails['customer_contact']}' readonly>
                                                </div>
                                                <div class='col-md-6 mb-3'>
                                                    <label class='fw-bold' for='customer_country'>Country</label>
                                                    <input type='text' id='customer_country' class='form-control' value='{$customerDetails['customer_country']}' readonly>
                                                </div>
                                            </div>
                                            ";
                                        } else {
                                            echo "<p>Unable to fetch customer details.</p>";
                                        }

                                        echo "
                                        <div class='col-md-12 mb-3'>
                                            <label class='fw-bold' for='address'>Address</label>
                                            <textarea id='address' name='address' class='form-control' rows='5' readonly>{$orderDetails['customer_address']}</textarea>
                                        </div>
                                        ";
                                    } else {
                                        echo "<p>Unable to fetch order details.</p>";
                                    }
                                } else {
                                    echo "<p>No order ID found in the URL.</p>";
                                }
                                ?>
                            </div>

                            <div class="col-md-5">
                                <h5>Order Items</h5>
                                <hr>
                                <?php
                                require_once("../classes/cart_class.php");
                                require_once("../classes/product_class.php");

                                if ($order_id) {
                                    // Fetch order details
                                    $orderItems = getOrderItemsController($order_id);

                                    // Display column headers
                                    echo "
                                    <div class='row align-items-center mb-3 text-center fw-bold'>
                                        <div class='col-md-3'>
                                            <h5>Product</h5>
                                        </div>
                                        <div class='col-md-3'>
                                            <h5>Title</h5>
                                        </div>
                                        <div class='col-md-2'>
                                            <h5>Price</h5>
                                        </div>
                                        <div class='col-md-3'>
                                            <h5>Quantity</h5>
                                        </div>
                                    </div>";

                                    $totalPrice = 0;
                                    // Loop through each order item
                                    foreach ($orderItems as $item) {
                                        $product_id = $item['product_id'];
                                        $quantity = $item['qty'];
                                        $product_title = $item['product_title'];
                                        $product_price = $item['product_price'];
                                        $product_image = $item['product_image'];
                                        $order_status = $item['order_status'];
                                        $totalPrice += $product_price * $quantity;

                                        // Output the individual product card
                                        echo "
                                        <div class='card shadow-sm mb-3 product_data'>
                                            <div class='card-body'>
                                                <div class='row align-items-center text-center'>
                                                    <div class='col-md-3'>
                                                        <img src='../images/product/{$product_image}' class='w-100' alt='Product Image'>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <h5>{$product_title}</h5>
                                                    </div>
                                                    <div class='col-md-2'>
                                                        <span>\${$product_price}</span>
                                                    </div>
                                                    <div class='col-md-2'>
                                                        <span>{$quantity}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                    }
                                }
                                ?>
                                <hr>
                                <h5 class="d-flex justify-content-between">Total Price: <span class="float-end"> <?= number_format($totalPrice, 2) ?></span></h5>
                                <hr>
                                <label for="">Status</label>
                                <div class="mb-3">
                                    <form action="../actions/updateorderaction.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                        <select id="order_status" name="order_status" class="form-select">
                                            <option value="Pending" <?= $order_status == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="Shipped" <?= $order_status == 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                                            <option value="Delivered" <?= $order_status == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                                            <option value="Cancelled" <?= $order_status == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                        </select>
                                        <button type="submit" name="update_order_status" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../view/adminfooter.php'; ?>

<!-- Add FontAwesome CDN to display icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
