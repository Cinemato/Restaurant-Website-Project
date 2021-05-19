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
    
    public function getCurrentCart($userId){
        $query = "SELECT * FROM cart WHERE $userId = ? AND current_cart = 0";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("Location: index.php?sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            return $row;
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

    public function getCurrentCartItems(){
        $cart = $this->getCurrentCart($_SESSION['user_id']);
        return $this->getCart($cart['cart_id']);
    }

    public function switchCurrentCart(){
        $cart = $this->getCurrentCart($_SESSION['user_id']);
        $id = $cart['cart_id'];
        $query = "UPDATE cart SET current_cart = 1 WHERE cart_id = {$id}";

        return $query;
    }
}
?>