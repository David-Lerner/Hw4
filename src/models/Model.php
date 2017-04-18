<?php
namespace complete_sudoku\models;

use complete_sudoku\configs\Config;

class Model {
    public $connection;

    public function __construct() {
	    $this->initiateConnection();
    }

    public function initiateConnection() {
	    $this->connection = mysqli_connect(Config::DB_HOST,Config::DB_USER,Config::DB_PASSWORD,Config::DB_NAME,Config::DB_PORT,Config::DB_SOCKET);
	    if (!$this->connection) {
            return false;
        }
        return true;
    }

    public function closeConnection() {
	    mysqli_close($this->connection);
    }
}
?>