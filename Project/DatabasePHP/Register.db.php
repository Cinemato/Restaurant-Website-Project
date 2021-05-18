<?php
if(isset($_POST['register-submit']))
{
    require('Objects.php');

    $name = $_POST['name-surname'];
    $email = $_POST['email'];  
    $pass = $_POST['password'];
    $confirmPass = $_POST['password-again'];

    if( empty($name) || empty($email) || empty($pass) || empty($confirmPass))
    {
        header("Location: ../register.php?error=emptyfields&mail=".$email."&name=".$name);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../register.php?error=invalidmail");
        exit();
    }
    else if($pass !== $confirmPass){
        header("Location: ../register.php?error=passwordcheck&mail=".$email."&name=".$name);
        exit();
    }
    else
    {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($db->con);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: register.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $checkResult = mysqli_stmt_num_rows($stmt);

            if($checkResult > 0)
            {
                header("Location: ../register.php?error=mailtaken&mail=".$email."&name=".$name);
                exit();
            }
            else
            {
                $sql = "INSERT INTO users (name, email, pass) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($db->con);

                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
                else
                {
                    $hashPass = password_hash($pass, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashPass);
                    mysqli_stmt_execute($stmt);
                    
                    $sql = "SELECT * FROM users WHERE email = ?";
                    $stmt = mysqli_stmt_init($db->con);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../register.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $email);
                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_assoc($result);

                        $cart->newCart($row['user_id']);
                    }

                    header("Location: ../login.php?signup=success&mail=".$email."&name=".$name);
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($db->con);
}
else
{
    header("Location: ../register.php");
    exit();
}
?>
