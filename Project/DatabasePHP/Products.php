<?php
class Products{
    public $db = null;

    public function __construct(Database $db){
        if(!$db->con) return null;

        $this->db = $db;
    }

    public function getProducts($table = 'products'){
        $query = $this->db->con->query("SELECT * FROM {$table}");
        $rows = array();

        while($row = mysqli_fetch_assoc($query)){
            $rows[] = $row;
        }

        return $rows;
    }

    public function getProduct($productId){
        $query = $this->db->con->query("SELECT * FROM products WHERE product_id = {$productId}");
        $row = mysqli_fetch_assoc($query);
        
        return $row;
    }
}
?>