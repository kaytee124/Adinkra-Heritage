<?php 
include '../view/header.php';
include '../view/slider.php';

?>

<div class="py-5">
    <div class="container">
        <div class = "row">
            <div class="col-md-12">
                <h4>Lastest Products</h4>
                <hr>
                <div class="owl-carousel">
                    <?php
                    include("../controllers/product_controller.php");
                    $products = viewRecentProductsController();

                    if ($products) {
                       foreach ($products as $product) {
                          echo "<div class='item'> <!-- Added mb-4 for margin-bottom -->
                                      <div class='card'>
                                         <div class='card-body'>
                                            <a href='product_details.php?product_id={$product['product_id']}'>
                                               <img src='../images/product/{$product['product_image']}' width = '250px' height = '250px' alt='Product Image'>
                                               <h6>{$product['product_title']}</h6>
                                            </a>
                                         </div>
                                      </div>
                                </div>";
                             }
                    } else {
                       echo "<p>No products available.</p>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../view/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
        
    });
</script>