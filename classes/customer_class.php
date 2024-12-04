<?php
require("../settings/db_class.php");

class customer_class extends db_connection {

    // Check if email exists
    public function email_exists($email) {
        $ndb = new db_connection();
        $conn = $ndb->db_conn();

        $sql = "SELECT customer_id FROM customer WHERE customer_email = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            $exists = $stmt->num_rows > 0;
            $stmt->close();
            return $exists;
        } else {
            return false;
        }
    }

    // Add new customer
    public function add_customer($fullName, $phoneNumber, $email, $hashedPassword, $country, $city, $imagePath, $userRole) {
        $ndb = new db_connection();	
        $conn = $ndb->db_conn();

        $sql = "INSERT INTO customer (customer_name, customer_contact, customer_email, customer_pass, customer_country, customer_city, customer_image, user_role) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("sssssssi", $fullName, $phoneNumber, $email, $hashedPassword, $country, $city, $imagePath, $userRole);
            $stmt->execute();
            
            $result = $stmt->affected_rows > 0;
            $stmt->close();
            return $result;
        } else {
            return false;
        }
    }
}
?>
