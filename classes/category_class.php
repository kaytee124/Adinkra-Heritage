<?php
require_once("../settings/db_class.php");

class category_class extends db_connection
{
	//--INSERT--//
    
public function add_cat($a, $image)
{
    $ndb = new db_connection();	
	$name =  mysqli_real_escape_string($ndb->db_conn(), $a);
    $image = mysqli_real_escape_string($this->db_conn(), $image);
	$sql="INSERT INTO `categories`(`cat_name`, `cat_image`) VALUES ('$name', '$image')";
 	return $this->db_query($sql);
}
	

	//--SELECT--//
//--SELECT--//
public function get_all_categories()
{
    $sql = "SELECT * FROM `categories`";
    return $this->db_fetch_all($sql);
}




	//--UPDATE--//



//--DELETE--//
public function delete_cat($id)
{
    $id = (int)$id;
    $sql = "DELETE FROM `categories` WHERE `cat_id` = '$id'";
    return $this->db_query($sql);
}




}

?>