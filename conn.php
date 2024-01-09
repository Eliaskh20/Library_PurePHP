<?php

class DBL4 {
    
    private static $instance;  
    private $connection;

    private function __construct() {

        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'darr5';

        $this->connection = new mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) { 
            die('Database connection failed: ' . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) { 
            self::$instance = new DBL4();
        }

        return self::$instance;
    }

    public function getConnection() { 
        return $this->connection;
    }
}

  ?>