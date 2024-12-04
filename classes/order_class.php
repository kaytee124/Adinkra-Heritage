<?php
require_once("../settings/db_class.php");

class order_class extends db_connection {

    // Add new order
    public function addOrder($customer_id, $invoice_no, $order_date, $order_status, $customer_address) {
        $customer_id = mysqli_real_escape_string($this->db_conn(), $customer_id);
        $invoice_no = mysqli_real_escape_string($this->db_conn(), $invoice_no);
        $order_date = mysqli_real_escape_string($this->db_conn(), $order_date);
        $order_status = mysqli_real_escape_string($this->db_conn(), $order_status);
        $customer_address = mysqli_real_escape_string($this->db_conn(), $customer_address);

        $sql = "INSERT INTO `orders` (customer_id, invoice_no, order_date, order_status, customer_address) 
                VALUES ('$customer_id', '$invoice_no', '$order_date', '$order_status', '$customer_address')";
        
        // Execute the query
        if ($this->db_query($sql)) {
            // Retrieve the order_id of the newly inserted order
            $query = "SELECT order_id FROM `orders` WHERE customer_id = '$customer_id' ORDER BY order_id DESC LIMIT 1";
            $result = $this->db_fetch_one($query);
            return $result['order_id'] ?? false;
        }
        return false;
    }

    // Fetch customer orders
    public function getCustomerOrders($customer_id) {
        $customer_id = mysqli_real_escape_string($this->db_conn(), $customer_id);
        $sql = "SELECT * FROM `orders` WHERE `customer_id` = '$customer_id'";
        return $this->db_fetch_all($sql);
    }

    // Fetch customer details
    public function getCustomerDetails($customer_id) {
        $customer_id = mysqli_real_escape_string($this->db_conn(), $customer_id);
        $sql = "SELECT `customer_name`, `customer_email`, `customer_contact`, `customer_country`
                FROM `customer` WHERE `customer_id` = '$customer_id'";
        return $this->db_fetch_one($sql);
    }

    // Add order details to the database
    public function addOrderDetails($order_id, $product_id, $qty, $totalprice) {
        $order_id = mysqli_real_escape_string($this->db_conn(), $order_id);
        $product_id = mysqli_real_escape_string($this->db_conn(), $product_id);
        $qty = mysqli_real_escape_string($this->db_conn(), $qty);
        $totalprice = mysqli_real_escape_string($this->db_conn(), $totalprice);

        $sql = "INSERT INTO `orderdetails` (order_id, product_id, qty, totalprice)
                VALUES ('$order_id', '$product_id', '$qty', '$totalprice')";
        
        return $this->db_query($sql);
    }

    // Delete cart items after order is placed
    public function deleteCartItems($customer_id) {
        $customer_id = mysqli_real_escape_string($this->db_conn(), $customer_id);
        $sql = "DELETE FROM `cart` WHERE `c_id` = '$customer_id'";
        
        return $this->db_query($sql);
    }

    // Get all orders with the total price from orderdetails
    public function getallOrders() {
        // Correct SQL query with proper LEFT JOIN and aggregation
        $sql = "SELECT o.order_id, o.invoice_no, o.order_date, o.order_status, 
                SUM(od.totalprice) AS total_price, c.customer_name
                FROM orders o
                LEFT JOIN orderdetails od ON o.order_id = od.order_id
                LEFT JOIN customer c ON o.customer_id = c.customer_id
                GROUP BY o.order_id, o.invoice_no, o.order_date, o.order_status, c.customer_name";
        
        return $this->db_fetch_all($sql);
    }

    // Get all orders by customer_id
    public function getidOrders($cid) {
        // Correct SQL query with proper LEFT JOIN and aggregation
        $sql = "SELECT o.order_id, o.invoice_no, o.order_date, o.order_status, 
                SUM(od.totalprice) AS total_price, c.customer_name
                FROM orders o
                LEFT JOIN orderdetails od ON o.order_id = od.order_id
                LEFT JOIN customer c ON o.customer_id = c.customer_id
                WHERE c.customer_id = '$cid'
                GROUP BY o.order_id, o.invoice_no, o.order_date, o.order_status, c.customer_name";
        
        return $this->db_fetch_all($sql);
    }

    
    // Fetch order details by order_id
    public function getOrderDetails($order_id) {
        $order_id = mysqli_real_escape_string($this->db_conn(), $order_id);
        $sql = "SELECT o.order_id, o.invoice_no, o.order_date, o.order_status, o.customer_address, o.customer_id
                FROM orders o WHERE o.order_id = '$order_id'";
        return $this->db_fetch_one($sql);
    }

    // Fetch order items by order_id
    public function getOrderItems($order_id) {
        $order_id = mysqli_real_escape_string($this->db_conn(), $order_id);
        // Corrected SQL query: Join orderdetails with products on product_id, and join orders properly on order_id
        $sql = "SELECT od.product_id, o.order_status, p.product_title, p.product_price, od.qty, p.product_image
                FROM orderdetails od
                INNER JOIN products p ON od.product_id = p.product_id
                INNER JOIN orders o ON od.order_id = o.order_id
                WHERE od.order_id = '$order_id'";
        return $this->db_fetch_all($sql);
    }

    public function updateOrderStatus($order_id, $order_status) {
        $order_id = mysqli_real_escape_string($this->db_conn(), $order_id);
        $order_status = mysqli_real_escape_string($this->db_conn(), $order_status);

        $sql = "UPDATE `orders` SET `order_status` = '$order_status' WHERE `order_id` = '$order_id'";
        
        return $this->db_query($sql);
    }
}
?>
