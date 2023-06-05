<?php
class DataB {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "expentrack";

    public $db;

    public function __construct(){
        $this->db = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }
}


?>