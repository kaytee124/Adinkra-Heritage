<?php
require("../controllers/product_controller.php");

if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    
    // Call the delete function from the controller
    $result = deleteProductController($product_id);

    if ($result) {
        // Redirect with a success message
        header("Location: ../view/adminproducts.php?message=Product deleted successfully");
    } else {
        // Redirect with an error message
        header("Location: ../view/adminproducts.php?error=Failed to delete product");
    }
} else {
    // Redirect if no ID is provided
    header("Location: ../view/adminproducts.php?error=No product ID provided");
}
exit();
?>
