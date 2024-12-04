<?php
require_once("../classes/order_class.php");

// Sanitize input
function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Add new order controller
function addOrderController($customer_id, $invoice_no, $order_date, $order_status, $customer_address) {
    $order = new order_class();
    return $order->addOrder($customer_id, $invoice_no, $order_date, $order_status, $customer_address);
}

// Fetch customer orders controller
function getCustomerOrdersController($customer_id) {
    $order = new order_class();
    return $order->getCustomerOrders($customer_id);
}

// Fetch customer details controller
function getCustomerDetailsController($customer_id) {
    $order = new order_class();
    return $order->getCustomerDetails($customer_id);
}

// Add order details controller
function addOrderDetailsController($order_id, $product_id, $qty, $totalprice) {
    $order = new order_class();
    return $order->addOrderDetails($order_id, $product_id, $qty, $totalprice);
}

// Delete cart items controller
function deleteCartItemsController($customer_id) {
    $order = new order_class();
    return $order->deleteCartItems($customer_id);
}

function getallOrdersController() {
    $order = new order_class();
    return $order->getallOrders();
}

// Fetch order details by order_id
function getOrderDetailsController($order_id) {
    $order = new order_class();
    return $order->getOrderDetails($order_id);
}

// Fetch order items by order_id
function getOrderItemsController($order_id) {
    $order = new order_class();
    return $order->getOrderItems($order_id);
}

// Update order status controller
function updateOrderStatusController($order_id, $order_status) {
    $order = new order_class();
    return $order->updateOrderStatus($order_id, $order_status);
}

// Fetch total orders by customer_id
function getidOrdersController($cid) {
    $order = new order_class();
    return $order->getidOrders($cid);
}



?>
