<?php
require_once("../classes/product_class.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_title = $_POST['product-title'];
    $category = $_POST['product_cat'];
    $brand = $_POST['productbrand'];
    $price = $_POST['productprice'];
    $description = $_POST['description'];
    $keywords = $_POST['product_keyword'];

    // Handle image upload if new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image'];
        $image_name = time() . "_" . $image['name'];
        $target_dir = "../images/product/";
        $target_file = $target_dir . basename($image_name);

        // Move the uploaded image to the target directory
        if (move_uploaded_file($image['tmp_name'], $target_file)) {
            // Image uploaded successfully
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        // Keep the old image if no new image is uploaded
        $product = new product_class();
        $product_data = $product->getProductById($product_id);
        $image_name = $product_data['product_image'];
    }

    // Update product in the database
    $product = new product_class();
    $result = $product->updateProduct($product_id, $product_title, $category, $brand, $price, $description, $image_name, $keywords);

    if ($result) {
        header("Location: ../view/adminproducts.php");
    } else {
        echo "Error updating product.";
    }
}
?>
