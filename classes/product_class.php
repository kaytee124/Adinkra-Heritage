<?php
require_once("../settings/db_class.php");

class product_class extends db_connection {

    // Add Product
    public function addProduct($title, $brand, $category, $price, $description, $image, $keywords) {
        $title = mysqli_real_escape_string($this->db_conn(), $title);
        $brand = mysqli_real_escape_string($this->db_conn(), $brand);
        $category = mysqli_real_escape_string($this->db_conn(), $category);
        $price = mysqli_real_escape_string($this->db_conn(), $price);
        $description = mysqli_real_escape_string($this->db_conn(), $description);
        $image = mysqli_real_escape_string($this->db_conn(), $image);
        $keywords = mysqli_real_escape_string($this->db_conn(), $keywords);

        $sql = "INSERT INTO products (product_title, product_brand, product_cat, product_price, product_desc, product_image, product_keywords) 
                VALUES ('$title', '$brand', '$category', '$price', '$description', '$image', '$keywords')";
        
        return $this->db_query($sql);
    }

    // Delete a product
    public function deleteProduct($id) {
        $id = mysqli_real_escape_string($this->db_conn(), $id);
        $sql = "DELETE FROM products WHERE product_id = '$id'";
        return $this->db_query($sql);
    }

    // Get all products
    public function getProducts() {
        $sql = "SELECT * FROM products";
        return $this->db_fetch_all($sql);
    }

    // Get products by brand
    public function getProductsByBrand($brand_id) {
        $brand_id = mysqli_real_escape_string($this->db_conn(), $brand_id);
        $sql = "SELECT * FROM products WHERE product_brand = '$brand_id'";
        return $this->db_fetch_all($sql);
    }

    // Update product
    public function updateProduct($id, $title, $category, $brand, $price, $description, $image, $keywords) {
        $id = mysqli_real_escape_string($this->db_conn(), $id);
        $title = mysqli_real_escape_string($this->db_conn(), $title);
        $category = mysqli_real_escape_string($this->db_conn(), $category);
        $brand = mysqli_real_escape_string($this->db_conn(), $brand);
        $price = mysqli_real_escape_string($this->db_conn(), $price);
        $description = mysqli_real_escape_string($this->db_conn(), $description);
        $image = mysqli_real_escape_string($this->db_conn(), $image);
        $keywords = mysqli_real_escape_string($this->db_conn(), $keywords);

        $sql = "UPDATE products SET 
                product_title = '$title', 
                product_cat = '$category', 
                product_brand = '$brand', 
                product_price = '$price', 
                product_desc = '$description', 
                product_image = '$image', 
                product_keywords = '$keywords' 
                WHERE product_id = '$id'";

        return $this->db_query($sql);
    }

    // Fetch product by ID
    public function getProductById($id) {
        $id = mysqli_real_escape_string($this->db_conn(), $id);
        $sql = "SELECT * FROM products WHERE product_id = '$id'";
        return $this->db_fetch_one($sql);
    }

    // Get the 6 most recent products by product_id
    public function getRecentProducts() {
        // Select the 6 most recent products based on product_id
        $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 6";
        return $this->db_fetch_all($sql);
    }
}
?>
