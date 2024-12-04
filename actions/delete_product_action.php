<?php
require("../controllers/product_controller.php");

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    
    // Call the delete function from the controller
    $result = deleteProductController($product_id);

    if ($result) {
        // Redirect with a success message
        header("Location: ../view/viewproduct.php?message=Product deleted successfully");
    } else {
        // Redirect with an error message
        header("Location: ../view/viewproduct.php?error=Failed to delete product");
    }
} else {
    // Redirect if no ID is provided
    header("Location: ../view/viewproduct.php?error=No product ID provided");
}
exit();
