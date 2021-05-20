<?php
include('Partial-Files/header.php');

if(isset($_POST['delete'])){
    $cart->removeProduct($cart->getItem($_POST['product_id'])['cartItem_id']);
    header("Location:" . $_SERVER['PHP_SELF']);
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
                            <button class="stepper-buttons" onclick="decrement()">-</button>
                            <input id="itemInput" type=number min=0 max=110 value="<?php echo $_POST['count'. $product['product_id']]?>">
                            <button class="stepper-buttons" onclick="increment()">+</button>
                          </div>
                      </td>
                      <td>Jill</td>
                      <td><button class="delete-item">x</button></td>
                    </tr>
                    <?php
                        }
                    ?>
                  </table>
            </div>
            <div class="col-12">
                <p id="total-fee">Total: $35</p>
            </div>
        </section>
        <section class="add-adress">
            <p class="page-head-tag">Address</p>   
            <div class="col-12 mx-auto no-gutters">
                <div class="col-5">
                    <div class="address-input">
                        <textarea name="message" id="adress-area" rows="10" cols="30"></textarea>
                    </div>
                    <div class="button-group">
                        <div class="adress-btn edit-button">
                            <button class="edit-button">Edit</button>
                        </div>
                        <div class="adress-btn save-button">
                            <button class="edit-button">Save</button>
                        </div>
                    </div>
                </div>  
            </div>
        </section>

        <section class="card-informations">
            <p class="page-head-tag">Checkout</p>   
            <div class="col-6 no-gutters">   
                <div class="col-6 no-gutters">
                    <form class="no-gutters">
                        <div class="card-number">
                            <label for="email" class="text-field-text">Card Number*</label><br>
                            <input type="text" id="email" name="email" class="text-field-input"><br>
                        </div> 
                        <div class="col-12 exp-year-and-month no-gutters ">
                            <div class="row">
                                <div class="col-6 expire-month">
                                    <label for="email" class="text-field-text">Expire Month*</label><br>
                                    <input type="text" id="email" name="email" class="text-field-input"><br>
                                </div> 
                                <div class="col-6 expire-year">
                                    <label for="email" class="text-field-text">Expire Year*</label><br>
                                    <input type="text" id="email" name="email" class="text-field-input"><br>
                                </div> 
                                <div class="col-6 card-ccv">
                                    <label for="email" class="text-field-text">CCV*</label><br>
                                    <input type="text" id="email" name="email" class="text-field-input"><br>
                                </div> 
                            </div>
                        </div>
                        <div class="col-12 checkout-button no-gutters">
                            <button class="complete-checkout" type="submit" method="">Checkout</button>
                        </div>
                    </form>
                </div>    
            </div>
        </section>

    </div>
              


    <script>
        function increment() {
           document.getElementById('itemInput').stepUp();
        }
        function decrement() {
           document.getElementById('itemInput').stepDown();
        }
    </script>


    
    
</body>
</html>