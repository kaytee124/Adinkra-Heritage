<?php include('admin-header.php'); ?>
<?php include('../controllers/product_controller.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = viewProductsController();
                            if (!empty($products)) {
                                foreach ($products as $product) {
                                    echo "<tr>";
                                    echo "<td>{$product['product_id']}</td>";
                                    echo "<td><img src='../images/product/{$product['product_image']}' width='120px' height='80px' alt='{$product['product_title']}' class='img-fluid'></td>";
                                    echo "<td>{$product['product_title']}</td>";
                                    echo "<td>
                                        <form method='POST' action='../actions/admindeleteproduct.php' style='display:inline;'>
                                            <input type='hidden' name='product_id' value='{$product['product_id']}'>
                                            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                        </form>
                                        <a href='edit_product.php?id={$product['product_id']}' class='btn btn-primary btn-sm'>Edit</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No products.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('adminfooter.php'); ?>
