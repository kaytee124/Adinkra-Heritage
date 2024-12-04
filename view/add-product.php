<?php include '../view/venderheader.php'; ?>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />


    <div class="container">
        <div class="product-box">
            <form action="../actions/add_product_action.php" method="POST" enctype="multipart/form-data" id="productForm">
                <b id="productText" class="product-text">Add your product</b>

                              
                <?php
                require("../classes/category_class.php");
                $catModel = new category_class();
                $category = $catModel->db_fetch_all("SELECT * FROM categories");
                ?>
                <select name="product_cat" class ="input-field" required>
                    <option value="" disabled selected>Select Category</option>
                    <?php
                    foreach ($category as $category) {
                        echo "<option value='{$category['cat_id']}'>{$category['cat_name']}</option>";
                    }
                   ?>
                </select>

  
                <input type="text" id="product_title" name="product-title" placeholder="Product Title/ Product Name" required class="input-field">

                <input type="double" id="product_price" name="productprice" placeholder="Proctuct_price: $" required class="input-field">

                <input type="text" id="product_desc" name="description" placeholder="Describe the product." class="input-field">

                <?php
                require("../classes/brand_class.php");
                $brandModel = new brand_class();
                $brands = $brandModel->db_fetch_all("SELECT * FROM brands");
                ?>
                <select name="productbrand" class ="input-field" required>
                    <option value="" disabled selected>Select Brand</option>
                    <?php
                    foreach ($brands as $brand) {
                        echo "<option value='{$brand['brand_id']}'>{$brand['brand_name']}</option>";
                    }
                   ?>
                </select>

                <input type="file" id="image" name="image" class="input-field">

                <input type="text" name="product_keyword" id="product_keyword" placeholder="Enter keywords for users" class="input-field">

                <button type="submit" class="login-button">add-product</button>
                <hr>
            </form>
        </div>
    </div>

</html>
