<?php
include("../classes/customer_class.php");

function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Check if email exists
function email_exists_ctr($email) {
    $customer = new customer_class();
    return $customer->email_exists($email);
}

// Insert new customer
function add_customer_ctr($fullName, $phoneNumber, $email, $password, $country, $city, $imagePath, $userRole) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $customer = new customer_class();
    return $customer->add_customer($fullName, $phoneNumber, $email, $hashedPassword, $country, $city, $imagePath, $userRole);
}
?>
