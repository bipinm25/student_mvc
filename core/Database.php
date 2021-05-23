<?php

namespace app\core;

class Database{

    public \PDO $pdo;    
    
    public function __construct($dbParams = []) {
        if(count($dbParams) === 0){
            echo 'Configure database first';
            exit;
        }
        else {
            $host = $dbParams['host'] ?? '';
            $user = $dbParams['user'] ?? '';
            $pass = $dbParams['password'] ?? '';
            $db = $dbParams['db'] ?? '';

            try {
                $dataSource = 'mysql:host='.$host.';dbname='.$db;
                $this->pdo = new \PDO($dataSource, $user, $pass);  
                $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);        
                return $this->pdo;
            }
            catch(\PDOException $e) {
               die('Something went Wrong '.$e->getMessage());           
               exit;
            }      
        }        
    }
}