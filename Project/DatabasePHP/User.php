<?php
class User{
    public $db = null;

    public function __construct(Database $db)
    {
        if(!$db->con) return null;

        $this->db = $db;
    }


    public function updateUser($user_id, $name, $email, $address, $city, $phone)
    {
        $query = "UPDATE users SET name = ?, email = ?, address = ?, city = ?, phone = ? WHERE user_id = ?";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query))
        {
            header("Location: profile.php?sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $address, $city, $phone, $user_id);
            mysqli_stmt_execute($stmt);

            header("Location: profile.php?save=success");
            exit();
        }
    }

    public function getUser($userId)
    {
        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query))
        {
            header("Location: login.php?sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $userId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result))
            {
                return $row;
                header("Location:" . $_SERVER['PHP_SELF']);
                exit();
            }
            else
            {
                header("Location: login.php?sqlerror");
                exit();
            }
        }

    }
}
?>