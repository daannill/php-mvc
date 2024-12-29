<?php

class Database {

    private $host = HOST;
    private $usname = USERNAME;
    private $password = PASSWORD;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct() {
        
        // Data source name
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        
        // Option
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        try {
            $this->dbh = new PDO($dsn, $this->usname, $this->password, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }

    public function query($query) {

        $this->stmt = $this->dbh->prepare($query);
        
    }

    public function bind($param, $value, $type = null) {

        if( is_null($type) ) {

            switch( true ) :
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            endswitch;
            
        }

        $this->stmt->bindValue($param, $value, $type);

    }

    public function execute() {

        $this->stmt->execute();

    }

    public function fetch_assoc() {

        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function fetch_data() {

        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
        
    }

    public function numrow() {

        return $this->stmt->rowCount();
        
    }
    
}