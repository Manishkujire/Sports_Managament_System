<?php

class Admin extends Main
 {
    protected $id;

    public function __construct()
 {
        //$this->id = $_SESSION[ 'admin' ];
        parent::__construct();
    }

    public function loginAdmin( $name, $password )
 {
        try {
            $stmnt = $this->conn->prepare( "select email,pass from `admin` where ?='$name' and ?='$password'" );
            $stmnt->bindParam( 1, $name, PDO::PARAM_STR ) ;
            $stmnt->bindParam( 2, $password, PDO::PARAM_STR ) ;
            $stmnt->execute();
            $count = $stmnt->rowCount();
            $res = $stmnt->fetch( PDO::FETCH_ASSOC );
            if ( $count ) {
                return $count;
            } else
            return false;
        } catch( PDOException $e ) {
            echo $e->getMessage();
            return false;
        }
	}

        public function loginUser( $name, $password )
 {
            try {
                $stmnt = $this->conn->prepare( "select name,password from `player` where ?='$name' and ?='$password'" );
                $stmnt->bindParam( 1, $name, PDO::PARAM_STR ) ;
                $stmnt->bindParam( 2, $password, PDO::PARAM_STR ) ;
                $stmnt->execute();
                $count = $stmnt->rowCount();
                $res = $stmnt->fetch( PDO::FETCH_ASSOC );
                if ( $count ) {
                    return true;
                } else
                return false;
            } catch( PDOException $e ) {
                echo $e->getMessage();
                return false;
            }
        }

        public function loginCoach( $name, $password )
 {
            try {
                $stmnt = $this->conn->prepare( "select email,password from `coach` where email='$name' and password='$password'" );
                $stmnt->bindParam( 'email', $name, PDO::PARAM_STR ) ;
                $stmnt->bindParam( 'password', $password, PDO::PARAM_STR ) ;
                $stmnt->execute();
                $count = $stmnt->rowCount();
                $res = $stmnt->fetch( PDO::FETCH_ASSOC );
                $id = $res[ 'id' ];
                if ( $count ) {
                    $_SESSION[ 'id' ] = $id;
                    return true;
                } else
                return false;
            } catch( PDOException $e ) {
                echo $e->getMessage();
                return false;
            }
        }

        // Create Update Delete Code

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

        public function Rcud( $res ) {
            try {
                $stmt = $this->conn->prepare( $res );
                $stmt->execute();
                $id = $this->conn->lastInsertId();
                //$_SESSION[ 'success_message' ] = 'Successfully '.$message;
                return $id;
            } catch ( PDOException $e ) {
                echo $e->getMessage();
                $_SESSION[ 'error_message' ] = 'Sorry  still not '.$message;
                return false;
            }
        }

        public function ret( $stmt ) {
            $stmt = $this->conn->prepare( $stmt );
            $stmt->execute();
            return $stmt;

        }

    }
    ?>