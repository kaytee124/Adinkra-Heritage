<?php include  '../view/header.php'; ?>
<div class="py-5" style="margin-top: 80px;"> <!-- Adjust this margin as needed -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Brands</h1>
                <div class="row">
                    <?php
                    include("../controllers/brand_controller.php");
                    $brands = viewbrandcontroller();
                
                    if($brands)
                    {
                        foreach ($brands as $brand) {
                            echo "<div class='col-md-4 mb-4'> <!-- Added mb-4 for margin-bottom -->
                                        <div class='card'>
                                            <div class='card-body'>
                                                <a href='view_brand_product_customers.php?brand_id={$brand['brand_id']}'>
                                                    <img src='../images/brands/{$brand['brand_image']}' width='250px' height='250px' alt='Brand Image'>
                                                    <h3 class ='name'>{$brand['brand_name']}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>";
                        }
                    } else {
                        echo "<p>No brands found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include  '../view/footer.php'; ?>
