<?php include  '../view/header.php'; ?>
<div class="py-5" style="margin-top: 80px;"> <!-- Adjust this margin as needed -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products</h1>
                <div class="row">
                    <?php
                    include("../controllers/product_controller.php");
                    $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;
                    $products = viewProductsByBrandController($brand_id);

                    if (empty($products)) {
                        echo "<p>No products available for this brand.</p>";
                    } else {
                        foreach ($products as $product) {
                            echo "<div class='col-md-4 mb-4'> <!-- Added mb-4 for margin-bottom -->
                                    <div class='card'>
                                        <div class='card-body'>
                                            <a href='product_details.php?product_id={$product['product_id']}'>
                                                <img src='../images/product/{$product['product_image']}' width = '250px' height = '250px' alt='Product Image'>
                                                <h3>{$product['product_title']}</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                    ?>
                </div>
            </div>
    </div>
</div>
<?php include  '../view/footer.php'; ?>
