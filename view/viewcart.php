<?php include '../view/header.php'; ?>
<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <h1>Cart Details</h1>
                    <?php
                    require("../classes/cart_class.php");
                    require("../classes/product_class.php");

                    // Set the customer ID from sessionStorage or cookies
                    echo "
                    <script>
                        var cid = sessionStorage.getItem('cid');
                        document.cookie = 'cid=' + cid;
                    </script>
                    ";

                    $cid = $_COOKIE['cid'] ?? null;

                    if ($cid) {
                        // Create instances of cart_class and product_class
                        $cartModel = new cart_class();
                        $productModel = new product_class();

                        // Fetch cart items for the given customer ID
                        $cartItems = $cartModel->get_cart_items($cid);

                        if ($cartItems) {
                            // Add a row for the column headers
                            echo "
                            <div class='row align-items-center mb-3 fw-bold text-center'>
                                <div class='col-md-2'>
                                    <h5>Product</h5>
                                </div>
                                <div class='col-md-4'>
                                    <h5>Title</h5>
                                </div>
                                <div class='col-md-2'>
                                    <h5>Price</h5>
                                </div>
                                <div class='col-md-2'>
                                    <h5>Quantity</h5>
                                </div>
                                <div class='col-md-2'>
                                    <h5>Actions</h5>
                                </div>
                            </div>";

                            // Loop through each cart item
                            foreach ($cartItems as $cart) {
                                $product_id = $cart['p_id'];
                                $quantity = $cart['qty'];
                                $product_title = $cart['product_title'];
                                $product_price = $cart['product_price'];
                                $product_image = $cart['product_image'];
                                $totalPrice = $product_price * $quantity;

                                // Output the individual product card
                                echo "
                                <div class='card shadow-sm mb-3 product_data'>
                                    <div class='card-body'>
                                        <div class='row align-items-center text-center'>
                                            <div class='col-md-2'>
                                                <img src='../images/product/{$product_image}' class='w-100' alt='Product Image'>
                                            </div>
                                            <div class='col-md-4'>
                                                <h5>{$product_title}</h5>
                                            </div>
                                            <div class='col-md-2'>
                                                <span>\${$product_price}</span>
                                            </div>
                                            <div class='col-md-2'>
                                                <div class='input-group mb-3' style='width:120px'>
                                                    <button class='input-group-text decrement-btn'>-</button>
                                                    <input type='text' class='form-control text-center bg-white input-qty' value='{$quantity}' id='quantity'>
                                                    <button class='input-group-text increment-btn'>+</button>
                                                </div>
                                            </div>
                                            <div class='col-md-1'>
                                                <form action='../actions/deletecart_action.php' method='POST'>
                                                    <input type='hidden' name='product_id' value='{$product_id}'>
                                                    <input type='hidden' name='c_id' value='{$cid}'>
                                                    <input type='hidden' name='quantity' value='{$quantity}' id='quantity'>
                                                    <button type='submit' class='btn btn-danger'>Delete</button>
                                                </form>
                                            </div>
                                            <div class='col-md-1'>
                                                <button type='button' class='btn btn-success' onclick='updatecart({$product_id})'>Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }

                            // Display the "Proceed to checkout" button only if there are cart items
                            echo "<div class='float-end'>
                                    <a href='../view/checkout.php' class='btn btn-outline-primary'>Proceed to checkout</a>
                                  </div>";

                        } else {
                            // Display message when there are no items in the cart
                            echo "<div class='row'>
                                    <div class='col-md-12'>
                                        <p>No products found in your cart.</p>
                                    </div>
                                  </div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../view/footer.php'; ?>
