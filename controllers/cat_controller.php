<?php
include("../classes/category_class.php");

// Function to add new category
function add_cat_ctr($CatName, $image)
{
    $CATModel = new category_class();
    
    return $CATModel->add_cat($CatName, $image);
}

// Function to delete category
function delete_cat_ctr($CatId)
{
    $CatModel = new category_class();
    return $CatModel->delete_cat($CatId);
}

// Function to fetch all categories
// Function to fetch all categories
function get_all_categories_ctr()
{
    $CATModel = new category_class();
    return $CATModel->get_all_categories();
}


?>
