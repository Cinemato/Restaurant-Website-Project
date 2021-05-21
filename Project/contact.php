<?php 
    include('Partial-Files/header.php');


?>
<body>
    <?php include('Partial-Files/nav.php')?>
    <div class="container-fluid">
        <section class="contact-us">
            <div class="col-12">
            
                
                <div class="col-8 no-gutters">   
                    <div class="col-6 no-gutters">
                        <?php
                        if(isset($_GET['sent']))
                        {
                            echo '<div class="success">
                            <p>Message Sent Successfully!<br>We Will Respond To You Shortly</p>
                            </div>';
                        }

                        if(isset($_GET['error']))
                        {
                            if($_GET['error'] == "emptyfields")
                                echo '<p class="error">Required Fields Are Empty!</p>';
                        }
                        ?>
                        <p class="page-head-tag" style="margin-left: 0px">Contact Us</p>
                        <form class="no-gutters" method="post" action="DatabasePHP/Message.db.php">
                            <div class="feedback-name">
                                <label for="feedback-name" class="text-field-text">Name: </label><br>
                                <input type="text" id="feedback-name" name="feedback-name" class="text-field-input" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ""?>"><br><br>
                            </div>
                            <div class="feedback-email">
                                <label for="feedback-email" class="text-field-text">Email: </label><br>
                                <input type="text" id="feedback-email" name="feedback-email" class="text-field-input" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : ""?>"><br><br>   
                            </div>
                            <div class="feedback-subject">
                                <label for="feedback-subject" class="text-field-text">Subject: </label><br>
                                <input type="text" id="feedback-title" name="feedback-subject" class="text-field-input" value="<?php echo isset($_GET['subject']) ? $_GET['subject'] : ""?>"><br>
                            </div> 
                            <div class="feedback-content">
                                <label for="feedback-content" class="text-field-text">Message:  </label><br>
                                <textarea name="feedback-content" id="feedback-content" rows="10" cols="30"><?php echo isset($_GET['msg']) ? $_GET['msg'] : ""?></textarea>
                            </div>
                            <div class="col-12 checkout-button no-gutters">
                                <button class="complete-checkout" type="submit" name="msg">Send</button>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </section>
    </div> 
</body>
</html>