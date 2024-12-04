<?php include '../view/venderheader.php'; ?>
<link rel="stylesheet" href="../css/display.css" type="text/css" />

    <div class="py-5" style="margin-top: 80px;"> <!-- Adjust this margin as needed -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Brands</h1>
                <div class="row">
                    <?php
                    include("../controllers/brand_controller.php");
                    echo "
                    <script>
                        var cid = sessionStorage.getItem('cid');
                        document.cookie = 'cid=' + cid;
                    </script>
                    ";
                    $cid = $_COOKIE['cid'] ?? null; // Get customer ID from cookie
                    $brands = viewbrand_idcontroller($cid); // Fetch brands based on the customer ID

                    foreach ($brands as $brand) {
                        echo "<div class='col-md-4 mb-4'> <!-- Added mb-4 for margin-bottom -->
                                <div class='card'>
                                    <div class='card-body'>
                                        <div class='d-flex justify-content-between align-items-center'>
                                            <a href='viewproduct.php?brand_id={$brand['brand_id']}'>
                                                <img src='../images/brands/{$brand['brand_image']}' width='250px' height='250px' alt='Brand Image'>
                                                <h3 class='name'>{$brand['brand_name']}</h3>
                                            </a>
                                        </div>
                                        <div>
                                            <button class='card-button delete-btn' onclick='openDeleteOverlay({$brand['brand_id']})'>Delete</button>
                                            <button class='card-button add-btn' onclick='redirectToAddProduct()'>Add Product</button>
                                        </div>
                                    </div>
                                </div>
                              </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="overlay" class="overlay">
            <div class="overlay-content">
                <span class="close-btn" onclick="closeOverlay()">&times;</span>
                <p id="overlay-message"></p>
                <form id="deleteForm" action="../actions/delete_brand_action.php" method="POST">
                    <input type="hidden" name="brand_id" id="brand_id" value="">
                    <button type="submit" class="card-button delete-btn">Confirm Delete</button>
                    <button type="button" class="card-button cancel-btn" onclick="closeOverlay()">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/overlay.js"></script>

<?php include '../view/footer.php'; ?>