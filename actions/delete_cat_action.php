<?php
include('../controllers/cat_controller.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $CATId = filter_input(INPUT_POST, 'cat_id', FILTER_SANITIZE_NUMBER_INT);

    $isDeleted = delete_cat_ctr($CATId);

    if ($isDeleted !== false) {
        header("Location: ../view/admincategories.php");
        exit;
    } else {
        echo "Failed to delete the category. Please try again.";
    }
}
?>
