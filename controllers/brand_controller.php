<?php
include("../classes/brand_class.php");

// Function to add new brand
function add_brand_ctr($brandName, $category, $image, $customerId)
{
    $brandModel = new brand_class();
    return $brandModel->add_brand($brandName, $category, $image, $customerId);
}

// Function to delete brand
function delete_brand_ctr($brandId)
{
    $brandModel = new brand_class();
    return $brandModel->delete_brand($brandId);
}

// Function to view all brands
function viewbrandcontroller() {
    $brand = new brand_class();
    return $brand->getbrand();
}

// Function to view brands associated with a specific customer
function viewbrand_idcontroller($cid) {
    $brand = new brand_class();
    return $brand->getbrandid($cid);
}
?>
