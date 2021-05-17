<?php
include('Partial-Files/header.php')
?>
<body>
    <section class="login-panel">
        <div class="row no-gutters">
            <div class="col-6 panel left-panel vh-100";>
                <div class="left-panel-container">
                    <div class="col-12">
                    <?php
                    if(isset($_GET['signup']))
                    {
                        echo '<p class="success">Registration Successful! You Can Login Now!</p>';
                    }

                    if(isset($_GET['error']))
                    {
                        if($_GET['error'] == "emptyfields")
                            echo '<p class="error">Required Fields Are Empty!</p>';
                        else if($_GET['error'] == "wrongmail")
                            echo '<p class="error">This email does not belong to any account!</p>';
                        else if($_GET['error'] == "wrongpass")
                            echo '<p class="error">Wrong Password!</p>';
                    }
                    ?>
                        <div class="col-6 mx-auto">
                            <h1 id="page-name">Login</h1>
                            <p id="page-description">See your growth and get consulting support!</p>
                        </div>  
                    </div>
                    <div class="col-12">
                        <div class="col-6 mx-auto">
                            <form action="DatabasePHP/Login.db.php" method="post">
                                <div class="email-textfield">
                                    <label for="email" class="text-field-text">Email*</label><br>
                                    <input type="text" id="email" name="email" class="text-field-input" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : ""?>"><br>
                                </div>    
                                <div class="password-textfield">
                                    <label for="password" class="text-field-text">Password*</label><br>
                                    <input type="password" id="password" name="password" class="text-field-input"><br>
                                </div>   
                                <div class="forget-password">
                                    <p class="link-redirector link-redirector-right">
                                        <a href="#">Forget password?</a>
                                    </p>
                                </div>  
                                <button type="submit" class="action-button" name="login-submit">Login</button>
                                <div class="forget-password">
                                    <p class="link-redirector link-redirector-left">    
                                        Not registered yet? <a href="register.php">Create an account.</a>
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