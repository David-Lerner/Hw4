<?php
namespace complete_sudoku\hw4\models;

use complete_sudoku\configs\Config;

class Model {
    public $conn;

    public function __construct() {
	$this->initiateConnection();
    }

    public function initiateConnection() {
	$this->conn = new mysqli(Config::DB_HOST,Config::DB_USER,Config::DB_PASSWORD,Config::DB_NAME,Config::DB_PORT,Config::DB_SOCKET);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function closeConnection() {
	$this->conn->close();
    }
}
?>