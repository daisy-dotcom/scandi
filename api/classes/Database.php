<?php

require(__DIR__ . "\..\..\private\config.php");

class Database{

    public function __construct(){
        $this->CONFIG = parse_ini_file(__DIR__ . "\..\..\private\config.ini");
        $this->setConnection();
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
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function insert($query , $data){
        try{
            $stmt = $this->connection->prepare($query);
            if ($stmt->execute($data) == TRUE){
                return 'SUCCESS';
            }
            else{
                return 'FAIL';
            }
        }
        catch (PDOException $e){
            if($e->errorInfo[1] == 1062){
                return 'DUPLICATE';
            } 
            else{
                echo $e->getMessage();
                return 'FAIL';
            } 
        }
    }

    public function delete($query , $data){

        try{

            $ids = implode(',' , array_fill(0,count($data),'?'));
            $appendToQuery = '('. $ids .')';
            $query = $query . $appendToQuery;
    
            $stmt = $this->connection->prepare($query);
            if ($stmt->execute($data) == TRUE){
                return 'SUCCESS';
            }
            else{
                return 'FAIL';
            }
        
        }
        catch(PDOException $e){
            if ($data != []){
                echo $e->getMessage();
                return 'FAIL';
            }
            else{
                return 'SUCCESS';
            }
            
        }



    }

}



?>