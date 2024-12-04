<?php
require_once("../controllers/order_controller.php");
require_once("../classes/cart_class.php");

// Fetch the customer ID from the form submission
$cid = $_POST['cid'] ?? null;
$customer_address = $_POST['address'] ?? null;

if ($cid) {
    // Fetch the cart items for the customer
    $cartModel = new cart_class();
    $cartItems = $cartModel->get_cart_items($cid);

    if ($cartItems) {
        // Generate an invoice number and set other order details
        $invoice_no = time(); // Unique invoice number
        $order_date = date('Y-m-d H:i:s');
        $order_status = 'Pending'; // Default status

        // Add the order (create only ONE order)
        $order_id = addOrderController($cid, $invoice_no, $order_date, $order_status, $customer_address);

        if ($order_id) {
            // Initialize total price
            $totalPrice = 0;

            // Loop through cart items to add order details
            foreach ($cartItems as $cart) {
                $product_id = $cart['p_id'];
                $qty = $cart['qty'];
                $product_price = $cart['product_price'];
                $totalPrice += $product_price * $qty;

                // Add individual product to order details
                addOrderDetailsController($order_id, $product_id, $qty, $product_price * $qty);
            }

            // Delete the cart items after the order is placed
            deleteCartItemsController($cid);

            // Redirect to a success page
            header('Location: ../view/customer_order.php?order_id='.$order_id);
            exit();
        } else {
            echo "Error placing order.";
        }
    } else {
        echo "No items in the cart.";
    }
} else {
    echo "No customer ID found.";
}
?>
