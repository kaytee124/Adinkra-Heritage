<?php
session_start();
include("../controllers/customerlogin_controller.php");

$response = ['error' => false, 'message' => '', 'user_role' => '', 'pid' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);

    $response = login_user($email, $password);
} else {
    $response['error'] = true;
    $response['message'] = "Wrong request method. Please try again.";
}

echo json_encode($response);
?>
