<?php
if(isset($_POST['msg']))
{
    session_start();
    require ("objects.php");
    require ("../PHPMailer/src/Exception.php");
    require ("../PHPMailer/src/PHPMailer.php");
    require ("../PHPMailer/src/SMTP.php");

    $name = $_POST['feedback-name'];
    $email = $_POST['feedback-email'];
    $subject = $_POST['feedback-subject'];
    $message = $_POST['feedback-content'];

    if(empty($name) || empty($email) || empty($subject) || empty($message))
    {
        header("Location: ../contact.php?error=emptyfields&name=".$name."&mail=".$email."&subject=".$subject."&msg=".$message);
        exit();
    }
    else
    {
        $query = "INSERT INTO messages (user_id, name, email, subject, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($db->con);

        if(!mysqli_stmt_prepare($stmt, $query))
        {
            header("Location: ../contact.php?error=sqlerror");
            exit();
        }
        else
        {
            $id = -1;
            if(isset($_SESSION['user_id'])){
                $id = $_SESSION['user_id'];
            }
            mysqli_stmt_bind_param($stmt, 'issss', $id, $name, $email, $subject, $message);
            mysqli_stmt_execute($stmt);

            $messages = $products->getProducts('messages');

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = "smtp.gmail.com";
            $mail->Port = '465';
            $mail->isHtml(true);
            $mail->Username = "khalidzzzzalhariri@gmail.com";
            $mail->SetFrom("khalidzzzzalhariri@gmail.com");
            $mail->Password = '99535499';
            $mail->Subject = "Message ID: " . count($messages) . " | Subject: " . $subject;
            $mail->Body = "From: " . $name . "<br>Email: " . $email . "<br>User ID: " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "Guest") . "<hr>" . $message;
            $mail->addAddress('alharerekhaled@gmail.com');

            if(!$mail->Send())
            {
                header("Location: ../contact.php?error=". $mail->ErrorInfo);
                exit();
            }
            else
            {
                header("Location: ../contact.php?sent=success");
                exit();
            }


        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($db->con);
}

else
{
    header("Location: contact.php");
    exit();
}

?>
