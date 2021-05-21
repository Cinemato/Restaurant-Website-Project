<?php
    include('Partial-Files/header.php');
    if(isset($_POST['checkout'])){
        $order->newOrder($_SESSION['user_id']);
    }
    else{
        header("Location: login.php?error=notloggedin");
    }
    
?>

<div class="col-12">
    <p class="page-head-tag">ORDER COMPLETED!</p>
</div>