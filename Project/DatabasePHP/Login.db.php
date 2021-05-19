<?php
if(isset($_POST['login-submit']))
{
    require('objects.php');

    $email = $_POST['email'];
    $pass = $_POST['password'];

    if(empty($email) || empty($pass))
    {
        header("Location: ../login.php?error=emptyfields&mail=".$email);
        exit();
    }

    else
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($db->con);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result))
            {
                $passCheck = password_verify($pass, $row['pass']);
                if(!$passCheck)
                {
                    header("Location: ../login.php?error=wrongpass&mail=".$email);
                    exit();
                }

                else if($passCheck)
                {
                    session_start();
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['email'] = $row['email'];
                    header("Location: ../meals.php?login=success");
                    exit();
                }

                else
                {
                    header("Location: ../login.php?error=wrongpass&mail=".$email);
                    exit();
                }
            }

            else
            {
                header("Location: ../login.php?error=wrongmail&mail=".$email);
                exit();
            }
        }
    }

}
?>
