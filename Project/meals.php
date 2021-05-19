<?php
include('Partial-Files/header.php')
?>
<body>
    <header>
        <div class="row">
            <div class="col-3">
                <div class="col-6 mx-auto">
                    <div class="header-logo">
                        <a href="#">Company Logo<img src="" class="company-logo"></a>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="col-9 mx-auto my-auto">
                    <div class="header-menu">
                        <ul>
                            <li>
                                <a href="#">Meals</a>
                            </li>
                            <li>
                                <a href="#">Cart</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                            <li>
                                <a href="#">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row" style="margin-top:50px;">
            <div class="col-9">
                <div class="col-12">
                    <p class="page-head-tag">Popular Dishes</p>
                </div>
                <div class="col-12 mx-auto">
                    <div class="row">
                    <?php
                        foreach($allProducts as $product) {
                    ?>
                        <div class="col-3">
                            <div class="meal-card">
                                <div class="meal-image">
                                    <img src="<?php echo $product['product_image']?>">
                                </div>
                                <div class="meal-details">
                                    <h4 class="meal-name"><?php echo $product['product_name']?></h4>
                                    <p class="meal-description"><?php echo $product['product_desc']?></p>
                                    <p class="meal-price"><?php echo '$' . $product['product_price']?></p>
                                    <div class=".btn-clss"><button class="action-button add-cart-button" >Add Cart</button></div>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="col-10 mx-auto no-gutters">
                    <div class="card-background">
                        <div class="col-12">
                            <div class="cart-body">
                                <h1>Cart</h1>
                                <div class="items">
                                    <div class="cart-item">
                                        <div class="card-image"><img src="common/img/meal.jpg" class="card-image"></div>
                                        <div class="item-description">
                                            <p class="name"> 2 x Chicken Menu</p>
                                            <p class="price"> $10.00</p>
                                        </div>

                                        <div class="" style="margin-left:50px;">
                                            <input type="text" id="count" name="count"  style="float: left;"value="1"><br>
                                            <button class="delete-item" style="">X</button>
                                        </div>
                                    </div><br>
                                    <div class="cart-item">
                                        <div class="card-image"><img src="common/img/meal.jpg" class="card-image"></div>
                                        <div class="item-description">
                                            <p class="name"> 2 x Chicken Menu</p>
                                            <p class="price"> $10.00</p>
                                        </div>

                                        <div class="" style="margin-left:50px;">
                                            <input type="text" id="count" name="count"  style="float: left;"value="1"><br>
                                            <button class="delete-item" style="">X</button>
                                        </div>
                                    </div><br>
                                    <div class="cart-item">
                                        <div class="card-image"><img src="common/img/meal.jpg" class="card-image"></div>
                                        <div class="item-description">
                                            <p class="name"> 2 x Chicken Menu</p>
                                            <p class="price"> $10.00</p>
                                        </div>

                                        <div class="" style="margin-left:50px;">
                                            <input type="text" id="count" name="count"  style="float: left;"value="1"><br>
                                            <button class="delete-item" style="">X</button>
                                        </div>
                                    </div><br>
                                    <div class="cart-item">
                                        <div class="card-image"><img src="common/img/meal.jpg" class="card-image"></div>
                                        <div class="item-description">
                                            <p class="name"> 2 x Chicken Menu</p>
                                            <p class="price"> $10.00</p>
                                        </div>

                                        <div class="" style="margin-left:50px;">
                                            <input type="text" id="count" name="count"value="1"><br>
                                            <button class="delete-item">X</button>
                                        </div>
                                    </div><br>
                                    
                                </div>
                                <hr>
                                <div class="delivery-cost">
                                    <p id="title">Delivery Cost:</p>
                                    <p id="costs">$10.00</p>
                                </div>    
                                <hr>  
                                <div class="total-cost">
                                    <p id="title">TOTAL: </p>
                                    <p id="costs">$10.00</p>
                                </div>                             
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="delivery-card">
                            <div class="delivery-info">
                                <div class="delivery-icon"><img src="common/img/food-delivery-50x50.png" /></div>
                                <div class="delivery-texts">
                                    <p class="delivery-text">Delivery time</p>
                                    <p class="delivery-time"> 30-40 min.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                         <br>
                     <div class="col-12">
                         <button type="submit"  style="height:50px;"class="action-button"><a href="cart.html" id="go-to-order-button">Go To Order</a></button>
                     </div> <br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>