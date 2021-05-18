<?php
class Cart{
    public $db = null;
    public $allProducts = null;

    public function __construct(Database $db, Products $allProducts){
        if(!$db->con) return null;

        $this->db = $db;
        $this->allProducts = $allProducts;
    }

    public function newCart($userId){
        if($userId != null){
            $query = $this->db->con->query("INSERT INTO cart(user_id) VALUES ({$userId})");
            return $query;
        }
    }

    public function addToCart($cartId, $productId, $qty){
        if($cartId != null && $productId != null && $qty != null){
           $query = $this->db->con->query("INSERT INTO cartItems(product_id, quantity, cart_id) VALUES({$productId}, {$qty}, {$cartId})");
           header("Location:" . $_SERVER['PHP_SELF']);
           return $query;
        }     
    }
    
    public function removeProduct($cartItemId){
        if($cartItemId != null){
            $query = $this->db->con->query("DELETE FROM cartItems WHERE cartItem_id = {$cartItemId}");
            header("Location:" . $_SERVER['PHP_SELF']);
        }
    }

    public function getCart($cartId){
        $query = "SELECT * FROM cartItems WHERE cart_id = ?";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("Location: index.php?sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "i", $cartId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $rows = array();

            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }

            return $rows;
        }
    }
}
?>