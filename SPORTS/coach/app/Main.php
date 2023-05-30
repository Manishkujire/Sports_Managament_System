<?php

class Main {

    protected $conn = null;

    public function __construct() {
        try {
           $this->conn =new PDO('mysql:dbname=epiz_33668131_sports;host=sql301.epizy.com','epiz_33668131','pXup7zlkxXd4ro'); 
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo $e;
            exit;
        }
    }

    public function redirect( $url = '' ) {
        header( 'Location: ' . $url . '.php' );
    }
}