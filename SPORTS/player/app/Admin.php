<?php

class Admin extends Main
 {
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function loginAdmin( $table, $name, $password )
    {
        try {
            $stmnt = $this->conn->prepare( 'SELECT * from '.$table.' where name='.$name.' AND password='.$password );
            $stmnt->execute();
            $count = $stmnt->rowCount();
            $res = $stmnt->fetch( PDO::FETCH_ASSOC );
            $id = $this->conn->lastInsertId();
            if ( $count ) {
                $_SESSION[ 'aid' ] = $id;
                return true;
            } else {
                return false;
            }

        } catch( PDOException $e ) {
            echo $e->getMessage();
            return false;
        }
    }

    public function ret( $query ) {
        try {
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            return $stmt;
        } catch ( PDOException $e ) {
            echo $e->getMessage();
            $_SESSION[ 'error_message' ] = 'Empty Records!!';
            return false;
        }
    }

    public function cud( $res, $message ) {
        try {
            $stmt = $this->conn->prepare( $res );
            $stmt->execute();

            $_SESSION[ 'success_message' ] = 'Successfully '.$message;
            return true;
        } catch ( PDOException $e ) {
            echo $e->getMessage();
            $_SESSION[ 'error_message' ] = 'Sorry  still not '.$message;
            return false;
        }
    }
}