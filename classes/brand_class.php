<?php
require_once("../settings/db_class.php");

class brand_class extends db_connection
{
    //--INSERT--//
    public function add_brand($a, $b, $image, $customer_id)
    {
        $ndb = new db_connection();    
        $name =  mysqli_real_escape_string($ndb->db_conn(), $a);
        $category = mysqli_real_escape_string($ndb->db_conn(), $b);
        $image = mysqli_real_escape_string($ndb->db_conn(), $image);
        $customer_id = mysqli_real_escape_string($ndb->db_conn(), $customer_id);
        $sql = "INSERT INTO brands(brand_name, brand_cat_id, brand_image, customer_id) VALUES ('$name', '$category', '$image', '$customer_id')";
        return $this->db_query($sql);
    }

    //--SELECT--//
    public function getbrand() {
        $sql = "SELECT * FROM brands";
        return $this->db_fetch_all($sql);
    }

    // Function to get brands by customer id
    public function getbrandid($cid) {
        $cid = (int)$cid; // Ensuring customer ID is treated as an integer
        $sql = "SELECT * FROM brands WHERE customer_id = '$cid'"; // Assuming 'customer_id' is the column linking brands to customers
        return $this->db_fetch_all($sql);
    }

    //--UPDATE--//

    //--DELETE--//
    public function delete_brand($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM brands WHERE brand_id = '$id'";
        return $this->db_query($sql);
    }
}
?>
