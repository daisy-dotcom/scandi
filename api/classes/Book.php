<?php

namespace api;
//use api\Database;

class Book extends Product implements CRUD{

    public function __construct($sku, $name, $price, $weight){
        parent::__construct($sku, $name, $price);
        setWeight($weight);
    }

    public function getWeight(){
        return $this->weight;
    }
    
    public function setWeight($weight){
        $this->weight = $weight;
        
    }

    public function get(){

    }
    
    public function insert(){
        $data = [
            'sku' => getSKU(),
            'name' => getName(),
            'price' => getPrice(),
            'weight' => getWeight(),
        ];
        $query = "insert into Book(sku, name, price, weight) values ". 
        "(:sku, :name, :price, :weight)";
        $stmt = $this->db.getConnection()

    }
    public function delete(){

    }

}

?>