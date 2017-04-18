<?php
/** Config.php contains a class with constants for things like
 *  database user, password, host, port, etc. Basically,
 *  it should have anything you think the grader might need
 *  to get your program running on the grader's machine.
 */

  namespace complete_sudoku\hw4\configs;

  class Config
  {
    const BASE_URL="http://localhost/Hw4";
    const DB_HOST="localhost";
  	const DB_PORT=3306;
  	const DB_SOCKET="";
  	const DB_USER="root";
  	const DB_PASSWORD="";
  	const DB_NAME="hw4";
  }
?>