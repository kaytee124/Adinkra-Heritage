<?php include('admin-header.php');?>
<?php include("../controllers/brand_controller.php");?>

<link rel="stylesheet" href="../css/display.css" type="text/css" />

<div class="container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "card">
                <div class="card-header">
                    <h2>Brands List</h2>
                </div>
                <div class="Card-Body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $brands =viewbrandcontroller();
                            if(!empty($brands))
                            {
                                foreach ($brands as $brand) {
                                    echo "<tr>";
                                    echo "<td>{$brand['brand_name']}</td>";
                                    echo "<td><img src='../images/brands/{$brand['brand_image']}' alt='{$brand['brand_name']}' width='100px' height ='100px' ></td>";
                                    echo "<td>
                                    <button class='card-button delete-btn' onclick='openDeleteOverlay({$brand['brand_id']})'>Delete</button>
                                    </td>";
                                    echo "</tr>";
                                }
                            }else {
                                echo "<tr><td colspan='3' class='text-center'>No Brands found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="overlay" class="overlay">
            <div class="overlay-content">
                <span class="close-btn" onclick="closeOverlay()">&times;</span>
                <p id="overlay-message"></p>
                <form id="deleteForm" action="../actions/admin_delete_brand_action.php" method="POST">
                    <input type="hidden" name="brand_id" id="brand_id" value="">
                    <button type="submit" class="card-button delete-btn">Confirm Delete</button>
                    <button type="button" class="card-button cancel-btn" onclick="closeOverlay()">Cancel</button>
                </form>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('adminfooter.php'); ?>
