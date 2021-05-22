<?php
    include('Partial-Files/header.php');
    if(isset($_POST['checkout'])){
        $order->newOrder($_SESSION['user_id']);
    }
    else{
        header("Location: login.php?error=notloggedin");
    }
    
    $orders = $order->getOrders($_SESSION['user_id']);
?>
<body>
    <?php include('Partial-Files/nav.php')?>
    <div class="container-fluid">
        <section class="order-completed">
            <div class="col-12">
                <div class="col-6 no-gutters mx-auto">   
                    <div class="completed-background col-12 no-gutters" >
                        <p class="order-completed-title">Order Completed</p>
                        <img src="common/img/order-completed.png"/>
                        <p class="order-id">Order completed. Your order id is: <?php echo $orders[count($orders)-1]['order_id']?></p>
                    </div>    
                </div>
            </div>
        </section>
    </div> 
</body>
</html>