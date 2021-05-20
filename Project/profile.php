<?php 
include('Partial-Files/header.php');
if(!isset($_SESSION['user_id'])){
    header("Location: login.php?error=notloggedin");
}
?>
<body>
    <?php include('Partial-Files/nav.php')?>
    <div class="container-fluid">
        <section class="profile-settings"> 
            <div class="col-12">
                <p class="page-head-tag">Profile Settings</p>
                <div class="col-6 no-gutters">   
                    <div class="col-6 no-gutters">
                        <form class="no-gutters">
                            <div class="user-name">
                                <label for="user-name" class="text-field-text">Name: </label><br>
                                <input type="text" id="user-name" name="user-name" class="text-field-input"><br>
                            </div> 
                            <div class="user-surname">
                                <label for="user-name" class="text-field-text">Surname: </label><br>
                                <input type="text" id="user-surname" name="user-surname" class="text-field-input"><br>
                            </div> 
                            <div class="user-mail">
                                <label for="user-mail" class="text-field-text">Email: </label><br>
                                <input type="text" id="user-mail" name="user-mail" class="text-field-input"><br>
                            </div> 
                            <div class="user-phone-number">
                                <label for="user-phone-number" class="text-field-text">Phone Number: </label><br>
                                <input type="text" id="user-phone-number" name="user-phone-number" class="text-field-input"><br>
                            </div> 
                            <div class="user-address">
                                <label for="user-address" class="text-field-text">Adress: </label><br>
                                <input type="text" id="user-address" name="user-address" class="text-field-input"><br>
                            </div>

                            <div class="col-12 checkout-button no-gutters" style="padding-bottom: 0px;">
                                <button class="complete-checkout" type="submit" method="">Update Changes</button>
                            </div>
                        </form>
                        <form action="DatabasePHP/Logout.db.php" method="post" class="col-12 checkout-button no-gutters" style="margin-top: 0px;">
                            <button class="complete-checkout" type="submit" style ="background:red; margin-top: 15px;">Log out</button>
                        </form>
                    </div>    
                </div>
            </div>
        </section>

        <section class="previous-orders">
            <div class="col-12">
                <p class="page-head-tag">Previous Orders</p>  
                <table class="checkout-table">
                    <tr id="first-row">
                      <th>Food</th>
                      <th>Order Date</th>
                      <th>Sum</th>
                      <th>Rating</th>
                      <th></th>
                    </tr>
                    <tr class="white-bordered-table-row">
                      <td>Jill</td>
                      <td>Smith</td>
                      <td>Smith</td>
                      <td>3.1/5</td>
                      <td><a class="link-redirector feedback-link" href="#">Give Feedback</button></td>
                    </tr>
                    <tr class="white-bordered-table-row">
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>Smith</td>
                        <td>3.1/5</td>
                        <td><a class="link-redirector feedback-link" href="#">Give Feedback</button></td>
                    </tr>
                    <tr class="white-bordered-table-row">
                      <td>Jill</td>
                      <td>Smith</td>
                      <td>Smith</td>
                      <td>3.1/5</td>
                      <td><a class="link-redirector feedback-link" href="#">Give Feedback</button></td>
                    </tr>
                    <tr class="white-bordered-table-row">
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>Smith</td>
                        <td>3.1/5</td>
                        <td><a class="link-redirector feedback-link" href="#">Give Feedback</button></td>
                      </tr>
                    <tr class="white-bordered-table-row">
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>Smith</td>
                        <td>3.1/5</td>
                        <td><a class="link-redirector feedback-link" href="#">Give Feedback</button></td>
                    </tr>
                  </table>
            </div>
        </section>

    </div>
              
    
    
</body>
</html>