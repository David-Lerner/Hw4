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

mysqli_select_db($conn, Config::DB_NAME);

//create tables
$drop_table_sheet = 'DROP TABLE IF EXISTS Sheet;';
mysqli_query($conn, $drop_table_sheet);

$create_table_sheet = 'CREATE TABLE Sheet (sheet_id INT AUTO_INCREMENT, sheet_name VARCHAR(30), sheet_data TEXT, PRIMARY KEY (sheet_id));';
mysqli_query($conn, $create_table_sheet);

$drop_table_sheet_codes = 'DROP TABLE IF EXISTS Sheet_Codes;';
mysqli_query($conn, $drop_table_sheet_codes);

$create_table_sheet_codes = 'CREATE TABLE Sheet_Codes (sheet_id INT, hash_code char(32), code_type VARCHAR(30), FOREIGN KEY (sheet_id) REFERENCES Sheet(sheet_id) ON DELETE CASCADE)';
mysqli_query($conn, $create_table_sheet_codes);

mysqli_close($conn);
echo "Database created successfully";
?>
