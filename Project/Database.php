<?php
class Database{
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $name = 'restaurant';
    
    public $con = null;
    
    public function __construct(){
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->name);
        
        if(!this->con)
            echo ("Connection Failed" . mysqli_connect.error());
    }
}
?>