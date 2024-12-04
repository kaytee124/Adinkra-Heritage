<?php
include("../controllers/cart_controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $cid = $_POST['cid'];
    $quantity = $_POST['quantity'];

    $result = update_cart_ctr($product_id, $cid, $quantity);

    if ($result) {
        echo json_encode(["success" => true, "message" => "Cart updated successfully."]);
    } else {
        echo json_encode(["success" => false, "error" => "Unable to update cart."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request method."]);
}
?>
