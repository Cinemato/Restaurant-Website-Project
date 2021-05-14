<?php
class User{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!$db->con) return null;

        $this->db = $db;
    }


    public function updateUser($user_id, $first_name, $last_name, $address, $city, $phone)
    {
        $query = "UPDATE users SET first_name = ?, last_name = ?, address = ?, city = ?, phone = ? WHERE user_id = ?";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query))
        {
            header("Location: account.php?sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $address, $city, $phone, $user_id);
            mysqli_stmt_execute($stmt);

            header("Location: account.php?save=success");
            exit();
        }
    }

    public function getUser($userId)
    {
        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query))
        {
            header("Location: index.php?sqlerror");
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
                header("Location: index.php?sqlerror");
                exit();
            }
        }

    }
}
?>