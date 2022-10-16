<?php

#namespace api;
require(__DIR__ . "\..\..\private\config.php");

class Database{
    #cho $host;
    #define('CONFIGS' , parse_ini_file(__DIR__ . "\..\..\private\config.ini"));
    public function __construct(){
        $this->CONFIG = parse_ini_file(__DIR__ . "\..\..\private\config.ini");
        #echo $this->CONFIG['dbname'];
        $this->setConnection();
        #cho __DIR__ . "\..\..\private\config.php" . "\n";
        #echo $host . ' ' . $username . "\n"; 
        /*echo "Database Constructor \n";
        echo __DIR__ . "\..\..\private\config.php" . "\n";*/
    }
    public function getConnection(){
        return $this->connection;
    }

    public function setConnection(){
        try{
            $host = $this->CONFIG['host'];
            $db = $this->CONFIG['db']; 
            $this->connection = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", 
            $this->CONFIG['username'], $this->CONFIG['password']);
            #var_dump($this->connection);
        }
        catch (PDOException $e){
            var_dump($e->getMessage());
        }
    }
    public function closeConnection(){
       
        $this->connection = null;
    }

    public function get($query){
        $stmt = $this->connection->prepare($query);
        if ($stmt->execute() == TRUE){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function insert($query , $data){
        try{
            $stmt = $this->connection->prepare($query);
            if ($stmt->execute($data) == TRUE){
                return 'SUCCESSFUL INSERTION';
            }
            else{
                return 'FAILED TO INSERT';
            }
        }
        catch (PDOException $e){
            if($e->errorInfo[1] == 1062){
                return 'Duplicate Entry' . "\n";
            } 
            #echo $e->getMessage() . "\n";
        }

    }

    public function delete($query , $data){
        $stmt = $this->connection->prepare($query);
        if ($stmt->execute($data) == TRUE){
            return 'SUCCESSFUL DELETION';
        }
        else{
            return 'FAILED DELETION';
        }
    }

}



?>