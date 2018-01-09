<?php

class DB_Connect {
    private $conn;

    // Connecting to database
    public function connect() {
        //require_once 'include/Config.php';
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'android_api';
        // Connecting to mysql database
        $charset = 'utf8mb4';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$opt = [
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$this->conn = new PDO($dsn, $user, $pass, $opt);
        
        // return database handler
        return $this->conn;
    }
}

?>
