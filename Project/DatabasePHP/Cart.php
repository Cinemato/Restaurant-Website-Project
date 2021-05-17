<?php
class Cart{
    public $db = null;
    public $allProducts = null;

    public function __construct(Database $db, Products $allProducts){
        if(!$db->con) return null;

        $this->db = $db;
        $this->allProducts = $allProducts;
    }

    public function addToCart($userId, $productId, $qty){
        if($userId != null && $productId != null){
            $query = $this->db->con->query("INSERT INTO cart(user_id, product_id, product_quantity) VALUES ({$userId}, {$productId}, {$qty})");
            header("Location:" . $_SERVER['PHP_SELF']);
            return $query;
        }     
    }

    public function removeProduct($productId, $userId){
        if($userId != null && $productId != null){
            $query = $this->db->con->query("DELETE FROM cart WHERE product_id = {$productId} AND user_id = {$userId}");
            header("Location:" . $_SERVER['PHP_SELF']);
        }
    }

    public function getCart($userId)
    {
        $query = "SELECT * FROM cart WHERE user_id = ?";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query))
        {
            header("Location: index.php?sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $userId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $cartArray = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $cartArray[] = $row;
            }

            return $cartArray;
        }
    }
}
?>