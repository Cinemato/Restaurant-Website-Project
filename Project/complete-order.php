<?php
include('Partial-Files/header.php');



if(!isset($_SESSION['user_id'])){
    header("Location: login.php?error=notloggedin");
}
else if(isset($_POST['delete'])){
    $cart->removeProduct($cart->getItem($_POST['product_id'])['cartItem_id']);
    header("Location:" . $_SERVER['PHP_SELF']);
}
else{
    $u = $user->getUser($_SESSION['user_id']);
}

if(count($cart->getCurrentCartItems()) <= 0){
    header("Location: index.php");
}

?>
<body>
    <?php include('Partial-Files/nav.php');?>
    <div class="container-fluid">
        <section class="checkout-cart"> 
            <div class="col-12">
                <p class="page-head-tag">Your Cart</p>
                <table class="checkout-table">
                    <tr id="first-row">
                      <th>Food</th>
                      <th>Price</th>
                      <th>Count</th>
                      <th>Sum</th>
                      <th></th>
                    </tr>
                    <?php
                        $cartItems = $cart->getCurrentCartItems();
                        foreach($cartItems as $item){
                            $product = $products->getProduct($item['product_id']);
                    ?>
                    <tr class="white-bordered-table-row">
                      <td><?php echo $product['product_name']?></td>
                      <td><?php echo "$" . $product['product_price']?></td>
                      <td>
                          <div class="stepper">
                            <input id="itemInput" type=number min=1 max=110 value="<?php echo $item['quantity']?>">
                          </div>
                      </td>
                      <td><?php echo $item['quantity'] * $product['product_price']?></td>
                      <td>
                        <form method="post">
                          <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                          <input class="delete-item" name="delete" type="submit" value="X">
                        </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </table>
            </div>
            <div class="col-12">
                <p id="total-fee">Total: <?php echo count($cartItems) > 0 ? "$" . $cart->getTotal() . " + $" . 10 : "$" . $cart->getTotal()?></p>
            </div>
        </section>
        <form class="no-gutters" method="post" action="order-complete.php">
        <section class="add-adress">
            <p class="page-head-tag">Address</p>   
            <div class="col-12 mx-auto no-gutters">
                <div class="col-5">
                    <div class="address-input">
                        <textarea name="message" id="adress-area" rows="10" cols="30"><?php echo $u['address']?></textarea>
                    </div>
                </div>  
            </div>
        </section>

        <section class="card-informations">
            <p class="page-head-tag">Checkout</p>   
            <div class="col-6 no-gutters">   
                <div class="col-6 no-gutters">
                    
                        <div class="card-number">
                            <label for="email" class="text-field-text">Card Number*</label><br>
                            <input type="text" id="email" name="email" class="text-field-input"><br>
                        </div> 
                        <div class="col-12 exp-year-and-month no-gutters ">
                            <div class="row">
                                <div class="col-6 expire-month">
                                    <label for="email" class="text-field-text">Expire Month*</label><br>
                                    <input type="text" required id="email" name="email" class="text-field-input"><br>
                                </div> 
                                <div class="col-6 expire-year">
                                    <label for="email" class="text-field-text">Expire Year*</label><br>
                                    <input type="text" required id="email" name="email" class="text-field-input"><br>
                                </div> 
                                <div class="col-6 card-ccv">
                                    <label for="email" class="text-field-text">CCV*</label><br>
                                    <input type="text" required id="email" name="email" class="text-field-input"><br>
                                </div> 
                            </div>
                        </div>
                        <div class="col-12 checkout-button no-gutters">
                            <button class="complete-checkout" name="checkout" type="submit">Checkout</button>
                        </div>
                </div>    
            </div>
        </section>
        </form>
    </div>
</body>
</html>