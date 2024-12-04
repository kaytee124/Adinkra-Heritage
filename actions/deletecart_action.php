<?php

include("../controllers/cart_controller.php");


$product_id = $_POST['product_id'];
$c_id = $_POST['c_id'];
$quantity = $_POST['quantity'];


if (isset($product_id) && isset($c_id) && isset($quantity)) {

    $result = delete_cart_ctr($product_id, $c_id, $quantity);

    if ($result) {
        header("Location: ../view/viewcart.php");
    } else {
        echo "Error: Could not update the cart.";
    }
} else {
    echo "Error: Invalid data received.";
}
?>
