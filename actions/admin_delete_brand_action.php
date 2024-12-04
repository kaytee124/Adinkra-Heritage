<?php
include('../controllers/brand_controller.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
$brandId = filter_input(INPUT_POST, 'brand_id', FILTER_SANITIZE_NUMBER_INT);

    
    $isDeleted = delete_brand_ctr($brandId);
    
    if ($isDeleted !== false) {
        header("Location: ../view/admin_brand_list.php");
    } else {
        echo "Failed to delete the brand. Please try again.";
    }
}
?>
