<?php 
include '../view/header.php'; 
?>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <h5>Details</h5>
                        <hr>
                        <?php
                        require_once("../classes/order_class.php");
                        require_once("../controllers/order_controller.php");

                        echo "
                        <script>
                            var cid = sessionStorage.getItem('cid');
                            document.cookie = 'cid=' + cid;
                        </script>
                        ";

                        $cid = $_COOKIE['cid'] ?? null;

                        if ($cid) {
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
                        } else {
                            echo "<p>No customer ID found in the session.</p>";
                        }
                        ?>
                        <div class="col-md-12 mb-3">
                            <label class="fw-bold" for="address">Address</label>
                            <textarea id="address" name="address" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h5>Order Items</h5>
                        <hr>
                        <?php
                        require_once("../classes/cart_class.php");
                        require_once("../classes/product_class.php");

                        if ($cid) {
                            $cartModel = new cart_class();
                            $productModel = new product_class();
                            $cartItems = $cartModel->get_cart_items($cid);

                            if (!$cartItems) {
                                echo "<script>window.location.href = 'view_product_customers.php';</script>";
                                exit;
                            }

                            echo "
                            <div class='row align-items-center mb-3 text-center fw-bold'>
                                <div class='col-md-3'><h5>Product</h5></div>
                                <div class='col-md-3'><h5>Title</h5></div>
                                <div class='col-md-2'><h5>Price</h5></div>
                                <div class='col-md-3'><h5>Quantity</h5></div>
                            </div>";

                            $totalPrice = 0;
                            foreach ($cartItems as $cart) {
                                $product_id = $cart['p_id'];
                                $quantity = $cart['qty'];
                                $product_title = $cart['product_title'];
                                $product_price = $cart['product_price'];
                                $product_image = $cart['product_image'];
                                $totalPrice += $product_price * $quantity;

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
                        <h5 class="d-flex justify-content-between">Total Price: <span class="float-end">$<?= $totalPrice ?></span></h5>
                        <div class="d-flex justify-content-between">
                            <form action="../actions/add_order_action.php" method="POST" id="orderForm">
                                <input type="hidden" name="cid" id="cid" value="">
                                <input type="hidden" name="address" id="hiddenAddress" value="">
                                <button type="button" class="btn btn-primary btn-lg btn-block w-100" id="payNowBtn">Pay Now</button>
                                <button type="submit" class="btn btn-secondary btn-lg btn-block w-100" id="confirmOrderBtn">Confirm Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Check and display any messages stored in session (if set)
if (isset($_SESSION['message'])) {
    echo "<script>
        Swal.fire({
            icon: '{$_SESSION['message']['icon']}',
            title: '{$_SESSION['message']['title']}',
            text: '{$_SESSION['message']['text']}'
        });
    </script>";
    // Unset message after display
    unset($_SESSION['message']);
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="../Payment/pay.js"></script>
<script>
    document.getElementById('cid').value = sessionStorage.getItem('cid');

    document.getElementById('confirmOrderBtn').addEventListener('click', function(event) {
        event.preventDefault();
        if (sessionStorage.getItem('paymentStatus') === 'success') {
            // Proceed to submit the form to confirm the order
            document.getElementById('orderForm').submit();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Payment Required',
                text: 'Please complete payment before confirming your order!',
            });
        }
    });

    document.getElementById('payNowBtn').addEventListener('click', function() {
        const email = document.getElementById('customer_email').value;
        const amount = <?= $totalPrice ?> * 100;
        payWithPaystack(email, amount);
    });
</script>

<?php include '../view/footer.php'; ?>
