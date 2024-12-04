<?php
include("../classes/cart_class.php");

// Function to add item to cart
function add_cart_ctr($product_id, $cid, $quantity)
{
    $cartModel = new cart_class();
    return $cartModel->add_to_cart($product_id, $cid, $quantity);
}

// Function to delete item from cart
function delete_cart_ctr($product_id, $cid, $quantity)
{
    $cartModel = new cart_class();
    return $cartModel->delete_from_cart($product_id, $cid, $quantity);
}

// Function to update item in the cart
function update_cart_ctr($product_id, $cid, $quantity)
{
    $cartModel = new cart_class();
    return $cartModel->update_cart($product_id, $cid, $quantity);
}

?>
