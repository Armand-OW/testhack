<?php

class DB_CONNECT {
    public $sth;

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

    function connect() {
        $filepath = realpath (dirname(__FILE__));
        require_once($filepath."/dbconfig.php");

        $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        
        // Selecing database
        $mysqli ->select_db(DB_DATABASE);

        $this->sth = $mysqli;
        // returing connection cursor
        return $mysqli; 
    }

	// Function to close the database
    function close() {
        // Closing data base connection
        mysqli_close($this->sth);
    }
 
}
 
?>