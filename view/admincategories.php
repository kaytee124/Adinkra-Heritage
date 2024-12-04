<?php include('admin-header.php'); ?>
<?php include('../controllers/cat_controller.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $categories = get_all_categories_ctr();
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    echo "<tr>";
                                    echo "<td><img src='../images/cat/{$category['cat_image']}'width=120px height=80px alt='{$category['cat_name']}' class='img-fluid'></td>";
                                    echo "<td>{$category['cat_id']}</td>";
                                    echo "<td>{$category['cat_name']}</td>";
                                    echo "<td>
                                        <form method='POST' action='../actions/delete_cat_action.php' style='display:inline;'>
                                            <input type='hidden' name='cat_id' value='{$category['cat_id']}'>
                                            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                        </form>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No categories found.</td></tr>";
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
