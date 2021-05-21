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
                <div class="col-9 mx-auto my-auto ">
                    <div class="header-menu">
                        <ul>
                            <li>
                                <a href="meals.php">Meals</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                            <li>
                                <?php if(isset($_SESSION['user_id'])){?>
                                <a href="profile.php">Profile</a>
                                <?php } else{?>
                                <a href="login.php">Login</a>
                                <?php }?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</header>