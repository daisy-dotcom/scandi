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
        $this->$query = "SELECT * FROM product join book using (sku)";
        //$this->data = [getSKU(), getName(), getPrice(), getSize()];
        return $this->db->get($query);

    }

    public function insert(){
        $this->$query = "INSERT INTO book(sku, weight) values (:sku, :weight)";
        $this->data = [
            'sku' => getSKU(), 
            'weight' => getWeight()
        ];
        return $this->db->insert($query, $data);

    }

    public function delete($skuToDelete){
        $this->$query = "DELETE FROM book where sku in ?";
        $this->data = $skuToDelete;
        return $this->db->insert($query, $data);
    }

}

?>