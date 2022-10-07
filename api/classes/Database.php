<?php

namespace api;

require '../../private/config.php';

class Database implements CRUD{

    public function _construct(){
        setConnection();
    }
    public function getConnection(){
        return $this->connection;
    }

    public function setConnection(){
        try{
            $this->connection = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", 
            $username, $password);
        }
        catch (PDOException $e){
            echo $e->getMessage();
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

    }

    public function delete($query , $data){

    }



}



?>