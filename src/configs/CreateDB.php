<?php
 /* * CreateDB.php can be run from the command-line to
 *    make an initial database
 */

namespace complete_sudoku\hw4\configs;

require_once('Config.php');

// Create connection
$conn = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, "", Config::DB_PORT, Config::DB_SOCKET);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = 'DROP DATABASE IF EXISTS '.Config::DB_NAME.';';
mysqli_query($conn, $sql);
$sql = 'CREATE DATABASE '.Config::DB_NAME.';';
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>