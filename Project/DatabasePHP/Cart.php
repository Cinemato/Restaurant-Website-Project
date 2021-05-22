<?php
class Cart{
    public $db = null;
    public $products = null;

    public function __construct(Database $db, Products $products){
        if(!$db->con) return null;

        $this->db = $db;
        $this->products = $products;
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
        $query = "SELECT * FROM cart WHERE user_id = ? AND current_cart = 0";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("Location: login.php?sqlerror");
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
            header("Location: login.php?sqlerror");
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
        $query = $this->db->con->query("UPDATE cart SET current_cart = 1 WHERE cart_id = {$id}");

        return $query;
    }

    public function getTotal(){
        $sum = 0;

        $cart = $this->getCurrentCartItems();

        foreach($cart as $cartProduct){
            $product = $this->products->getProduct($cartProduct['product_id']);
            $sum += $product['product_price'] * $cartProduct['quantity'];
        }

        return $sum;
    }

    public function inCart($productId){
        $cartId = $this->getCurrentCart($_SESSION['user_id'])['cart_id'];
        $query = $this->db->con->query("SELECT * FROM cartItems WHERE product_id = {$productId} AND cart_id = {$cartId}");
        if(mysqli_num_rows($query) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function getItem($productId){
        $cartId = $this->getCurrentCart($_SESSION['user_id'])['cart_id'];
        $query = $this->db->con->query("SELECT * FROM cartItems WHERE product_id = {$productId} AND cart_id = {$cartId}");
        $row = mysqli_fetch_assoc($query);

        return $row;
    }

    public function addQuantity($productId){
        $cart = $this->getCurrentCart($_SESSION['user_id']);
        $item = $this->getItem($productId);
        $cartId = $cart['cart_id'];
        $qty = $item['quantity'] + 1;
        $query = $this->db->con->query("UPDATE cartItems SET quantity = {$qty} WHERE product_id = {$productId} AND cart_id = {$cartId}");

        return $query;
    }
}
?>