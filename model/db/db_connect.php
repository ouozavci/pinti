<?php
/**
 * A class file to connect to database
 */
class DB_CONNECT {
 
    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }
 
    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }
 
    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/db_config.php';
 
        // Connecting to mysql database
        $mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error());
		mysqli_query($mysqli,"SET NAMES 'UTF8'");
		mysqli_query($mysqli,"SET CHARACTER SET utf8");
		mysqli_query($mysqli,"SET character_set_connection = 'UTF8'");
		mysqli_query($mysqli,"SET character_set_client = 'UTF8'");
		mysqli_query($mysqli,"SET character_set_results = 'UTF8'");

        // returing connection cursor
        return $mysqli;
    }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysqli_close($this->connect());
    }
 
}
?>