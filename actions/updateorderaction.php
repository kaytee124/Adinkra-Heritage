<?php
// Include necessary files
require_once("../controllers/order_controller.php");

// Check if the form is submitted with the necessary data
if (isset($_POST['update_order_status']) && isset($_POST['order_status']) && isset($_POST['order_id'])) {
    // Sanitize input to avoid security vulnerabilities
    $order_id = $_POST['order_id'];  // Corrected from $_GET to $_POST
    $order_status = htmlspecialchars(stripslashes(trim($_POST['order_status'])));

    // Call the controller function to update the order status
    $updateStatus = updateOrderStatusController($order_id, $order_status);

    // If update is successful, redirect to view-order.php with a success message
    if ($updateStatus) {
        header("Location: ../view/view-order.php?order_id=$order_id&status=success");
        exit;
    } else {
        // If the update fails, redirect back to the view-order.php with an error message
        header("Location: ../view/view-order.php?order_id=$order_id&status=error");
        exit;
    }
} else {
    // If no data is submitted, redirect back to the view-order.php with an error message
    header("Location: ../view/view-order.php?order_id={$_POST['order_id']}&status=error");
    exit;
}
