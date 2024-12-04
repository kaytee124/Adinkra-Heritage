<?php
require("../classes/product_class.php");

function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Function to add new product
function addProductController($product_title, $brand, $category, $price, $description, $image, $keywords) {
    $product = new product_class();
    return $product->addProduct($product_title, $brand, $category, $price, $description, $image, $keywords);
}

// Function to delete product
function deleteProductController($id) {
    $product = new product_class();
    return $product->deleteProduct($id);
}

// Function to view all products
function viewProductsController() {
    $product = new product_class();
    return $product->getProducts();
}

// Function to view products by brand
function viewProductsByBrandController($brand_id) {
    $product = new product_class();
    return $product->getProductsByBrand($brand_id);
}

// Function to view product by ID
function viewProductsByIDController($product_id) {
    $product = new product_class();
    return $product->getProductByID($product_id);
}

// Function to get 6 most recent products
function viewRecentProductsController() {
    $product = new product_class();
    return $product->getRecentProducts();
}
?>
