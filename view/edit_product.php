<?php
require_once("../classes/product_class.php");
require_once("../classes/category_class.php");
require_once("../classes/brand_class.php");

$productId = $_GET['id'];
$productModel = new product_class();
$product = $productModel->getProductById($productId);

// Fetch categories and brands
$catModel = new category_class();
$categories = $catModel->db_fetch_all("SELECT * FROM categories");

$brandModel = new brand_class();
$brands = $brandModel->db_fetch_all("SELECT * FROM brands");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" type="text/css" />
    <title>Edit Product</title>
</head>
<body class="product-body">
    <div class="container">
        <div class="product-box">
            <form action="../actions/edit_product_action.php" method="POST" enctype="multipart/form-data" id="productForm">
                <b id="productText" class="product-text">Edit Product</b>
                
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

                <select name="product_cat" class="input-field" required>
                    <option value="" disabled>Select Category</option>
                    <?php
                    foreach ($categories as $category) {
                        $selected = $category['cat_id'] == $product['product_cat'] ? 'selected' : '';
                        echo "<option value='{$category['cat_id']}' {$selected}>{$category['cat_name']}</option>";
                    }
                    ?>
                </select>

                <input type="text" id="product_title" name="product-title" value="<?php echo $product['product_title']; ?>" placeholder="Product Title/ Product Name" required class="input-field">

                <input type="double" id="product_price" name="productprice" value="<?php echo $product['product_price']; ?>" placeholder="Product Price: $" required class="input-field">

                <input type="text" id="product_desc" name="description" value="<?php echo $product['product_desc']; ?>" placeholder="Describe the product." class="input-field">

                <select name="productbrand" class="input-field" required>
                    <option value="" disabled>Select Brand</option>
                    <?php
                    foreach ($brands as $brand) {
                        $selected = $brand['brand_id'] == $product['product_brand'] ? 'selected' : '';
                        echo "<option value='{$brand['brand_id']}' {$selected}>{$brand['brand_name']}</option>";
                    }
                    ?>
                </select>

                <input type="file" id="image" name="image" class="input-field">

                <input type="text" name="product_keyword" id="product_keyword" value="<?php echo $product['product_keywords']; ?>" placeholder="Enter keywords for users" class="input-field">

                <button type="submit" class="login-button">Update Product</button>
                <hr>
            </form>
        </div>
    </div>
</body>
</html>
