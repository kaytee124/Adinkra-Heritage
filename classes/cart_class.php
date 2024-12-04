<?php
require_once("../settings/db_class.php");

class cart_class extends db_connection {

    // Function to add a product to the cart
    public function add_to_cart($product_id, $c_id, $quantity) {
        // Check if the product already exists in the cart
        $checkQuery = "SELECT qty FROM cart WHERE p_id = '$product_id' AND c_id = '$c_id'";
        $existingProduct = $this->db_fetch_one($checkQuery);
    
        if ($existingProduct) {
            // If the product exists, send a message saying it's already in the cart
            return false;
        } else {
            // Else insert it into the cart
            $insertQuery = "INSERT INTO cart (p_id, c_id, qty) VALUES ('$product_id', '$c_id', '$quantity')";
            return $this->db_query($insertQuery);
        }
    }

    // Function to delete or reduce the quantity in the cart
    public function delete_from_cart($product_id, $c_id, $quantity) {
            $deleteQuery = "DELETE FROM cart WHERE p_id = '$product_id' AND c_id = '$c_id'";
            return $this->db_query($deleteQuery);
        
    }

    // Function to get all cart items for a specific customer
    public function get_cart_items($c_id) {
        // Fetch all products in the cart for the customer
        $cartItemsQuery = "SELECT cart.p_id, cart.qty, products.product_title, products.product_price, products.product_image
                           FROM cart 
                           JOIN products ON cart.p_id = products.product_id 
                           WHERE cart.c_id = '$c_id'";

        return $this->db_fetch_all($cartItemsQuery);
    }

    public function update_cart($product_id, $c_id, $quantity) {
        // Ensure the product exists in the cart
        $checkQuery = "SELECT qty FROM cart WHERE p_id = '$product_id' AND c_id = '$c_id'";
        $existingProduct = $this->db_fetch_one($checkQuery);
    
        if ($existingProduct) {
            // Update the product quantity if it exists
            $updateQuery = "UPDATE cart SET qty = $quantity WHERE p_id = '$product_id' AND c_id = '$c_id'";
            return $this->db_query($updateQuery);
        } else {
            // Return false if the product is not found in the cart
            return false;
        }
    }
}
?>
