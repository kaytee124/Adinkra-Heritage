<?php
include ('../controllers/cat_controller.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $catName = filter_input(INPUT_POST, 'cat_name', FILTER_SANITIZE_STRING);

    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExtension, $allowedExtensions)) {
            $uploadDir = '../images/cat/';
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadFilePath = $uploadDir . $newImageName;

            if (move_uploaded_file($imageTmpPath, $uploadFilePath)) {
                $imagePath = $newImageName;
            } else {
                $response["message"] = "Error uploading the image.";
                echo json_encode($response);
                exit();
            }
        } else {
            $response["message"] = "Invalid image type. Only JPG, JPEG, PNG, and GIF are allowed.";
            echo json_encode($response);
            exit();
        }
    } else if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $response["message"] = "Error uploading the image: " . $_FILES['image']['error'];
        echo json_encode($response);
        exit();
    }

    $isAdded = add_cat_ctr($catName, $imagePath);

    header('Content-Type: application/json');
    if ($isAdded !== false) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to add the category.']);
    }
    exit();
}
?>
