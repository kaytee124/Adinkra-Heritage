<?php
include('admin-header.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form id="add-category-form">
                        <div class="col-md-6">
                            <input type="text" name="cat_name" placeholder="Category Name" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="file" id="image" name="image" class="input-field">
                        </div>
                        <div class="col-md-6 mt-3">
                            <button type="submit" class="btn bg-gradient-primary">Add Category</button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include SweetAlert and custom JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/category.js"></script>
