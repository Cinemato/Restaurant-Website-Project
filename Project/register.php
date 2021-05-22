<?php
include('Partial-Files/header.php')
?>
<body>  

    <section class="login-panel">
        <div class="row no-gutters">
            <div class="col-6 panel left-panel vh-100">
                <div class="left-panel-container">
                    <div class="col-12">
                    <?php
                    if(isset($_GET['error']))
                    {
                        if($_GET['error'] == "emptyfields")
                            echo '<p class="error">Required Fields Are Empty!</p>';
                        else if($_GET['error'] == "invalidmail")
                            echo '<p class="error">Invalid Email!</p>';
                        else if($_GET['error'] == "passwordcheck")
                            echo '<p class="error">Passwords Are Not Equal!</p>';
                        else if($_GET['error'] == "mailtaken")
                            echo '<p class="error">Account Already Exists!</p>';
                     }
                    ?>
                        <div class="col-6 mx-auto">
                            <h1 id="page-name">Sign Up</h1>
                            <p id="page-description">Delicious meals at your doorstep!</p>
                        </div>  
                    </div>
                    <div class="col-12">
                        <div class="col-6 mx-auto">
                            <form action="DatabasePHP/Register.db.php" method="post">
                                <div class="name-surname-textfield">
                                    <label for="name-surname" class="text-field-text">Name-Surname*</label><br>
                                    <input type="text" id="name-surname" name="name-surname" class="text-field-input" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ""?>"><br>
                                </div>   
                                <div class="email-textfield">
                                    <label for="email" class="text-field-text">Email*</label><br>
                                    <input type="text" id="email" name="email" class="text-field-input" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : ""?>"><br>
                                </div>    
                                <div class="password-textfield">
                                    <label for="password" class="text-field-text">Password*</label><br>
                                    <input type="password" id="password" name="password" class="text-field-input"><br>
                                </div>   
                                <div class="password-textfield">
                                    <label for="password-again" class="text-field-text">Password Again*</label><br>
                                    <input type="password"  id="password-again" name="password-again" class="text-field-input"><br>
                                </div>   
                                <button type="submit" class="action-button" name="register-submit">Sign Up</button>
                                <div class="sign-in-redirector">
                                    <p class="link-redirector link-redirector-left">    
                                        Already have an account? <a href="login.php">Sign In.</a>
                                    </p>
                                </div>  
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="col-12 panel right-panel vh-100">
                    <div class="col-6 mx-auto">
                        <img src="">
                    </div>
                </div>
            </div>
    </section>     
</body>
</html>