<?php
require("../settings/db_class.php");

class customerlogin_class extends db_connection
{
    //--SELECT USER--//
    public function get_user_by_email($email)
    {
        $sql = "SELECT customer_id, customer_pass, user_role, customer_name FROM customer WHERE customer_email = ?";
        $stmt = $this->db_conn()->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($pid, $hashedPassword, $user_role, $customerName);
                $stmt->fetch();
                return ['pid' => $pid, 'hashedPassword' => $hashedPassword, 'user_role' => $user_role, 'customerName' => $customerName];
            } else {
                return null;
            }
        } else {
            return false;
        }
    }

    // Function to verify password
    public function verify_password($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }
}
?>
