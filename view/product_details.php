<?php include '../view/header.php'; ?>

<?php 
include("../controllers/product_controller.php");
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
$products = viewProductsByIDController($product_id);

if (empty($products)) {
    echo "<p>No products available for this brand.</p>";
} else {
    echo "<div class= 'bg-light py-4'>
            <div class='container product_ data'  style='margin-top: 30px;'> <!-- Adjust margin as needed -->
                <!-- Image and Description Section -->
                <div class='row'>
                    <!-- Product Image on the left -->
                    <div class='col-md-6'>
                        <img src='../images/product/{$products['product_image']}' 
                            width='100%' height='auto' 
                            alt='Product Image' class='img-fluid'>
                    </div>

                    <!-- Product Description on the right -->
                    <div class='col-md-6'>
                        <h3 class ='fw-bold'>{$products['product_title']}</h3>
                        <hr>
                        <h6>Product Description:</h6>
                        <p>{$products['product_desc']}</p>
                        <hr>
                        <p>Price: $ {$products['product_price']}</p>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class='input-group mb-3' style='width:130px'>
                                    <button class='input-group-text decrement-btn'>-</button>
                                    <input type='text' class='form-control text-center bg-white input-qty' value='1' id='quantity'>
                                    <button class='input-group-text increment-btn'>+</button>
                                </div>
                            </div>
                        </div>
                        <div class='row mt-3'>
                            <!-- Add to Cart Button -->
                            <div class='col-md-6'>
                                <button class='btn btn-primary px-4' id='add-to-cart' onclick='addToCart({$products['product_id']})'><i class='fa fa-shopping-cart me-2'></i>
                                Add to Cart</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>    
        </div>";
}
?>

<?php include '../view/footer.php'; ?>