<?php
class Order{
    public $db = null;
    public $cart = null;

    public function __construct(Database $db, Cart $cart){
        if(!$db->con) return null;

        $this->db = $db;
        $this->cart = $cart;
    }

    public function newOrder($userId){
        $total = $this->cart->getTotal() + 10;
        $cartId = $this->cart->getCurrentCart($userId)['cart_id'];
        $query = "INSERT INTO orders(user_id, cart_id, total) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("Location: login.php?sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "iii", $userId, $cartId, $total);
            mysqli_stmt_execute($stmt);
            $this->cart->switchCurrentCart();
            $this->cart->newCart($userId);
        }
    }
}
?>