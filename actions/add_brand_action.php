<?php
include ('../controllers/brand_controller.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $brandName = filter_input(INPUT_POST, 'brand_name', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'brand_cat', FILTER_SANITIZE_STRING);
    $customerId = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING); // Get customer ID

    // Initialize image path
    $imagePath = null;

    // Check if an image has been uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Validate image file extension
        if (in_array($imageExtension, $allowedExtensions)) {
            // Define upload directory
            $uploadDir = '../images/brands/';
            // Ensure the directory is writable
            if (!is_writable($uploadDir)) {
                echo json_encode(["message" => "Upload directory is not writable."]);
                exit();
            }

            // Generate unique image name
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadFilePath = $uploadDir . $newImageName;

            // Attempt to move the uploaded file
            if (move_uploaded_file($imageTmpPath, $uploadFilePath)) {
                $imagePath = $newImageName;
            } else {
                echo json_encode(["message" => "Error uploading the image."]);
                exit();
            }
        } else {
            echo json_encode(["message" => "Invalid image type. Only JPG, JPEG, PNG, and GIF are allowed."]);
            exit();
        }
    } else if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        // Handle other upload errors
        echo json_encode(["message" => "Error uploading the image: " . $_FILES['image']['error']]);
        exit();
    }
    
    // Add the brand to the database, now passing customer_id as well
    $isAdded = add_brand_ctr($brandName, $category, $imagePath, $customerId);

    // Redirect or display an error based on result
    if ($isAdded !== false) {
        header("Location: ../view/view-brand_list.php");
        exit();
    } else {
        echo "Failed to add the brand. Please try again.";
    }
}
?>
