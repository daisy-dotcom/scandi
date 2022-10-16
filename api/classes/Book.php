<?php

require_once(__DIR__ . '\..\include\autoloader.php');

class Book extends Product implements DBQueries{

    public function __construct($sku, $name, $price, $weight){
        parent::__construct($sku, $name, $price);
        $this->setWeight($weight);
    }

    public function getWeight(){
        return $this->weight;
    }
    
    public function setWeight($weight){
        $this->weight = $weight;
        
    }

    public function get(){
        $this->$query = "SELECT * FROM product join book using (sku)";
        return $this->db->get($this->query);

    }

    public function insert(){
        $this->query = "INSERT INTO book(sku, weight) values(:sku, :weight)";
        $this->data = [
            'sku' => $this->getSKU(), 
            'weight' => $this->getWeight()
        ];
        return $this->db->insert($this->query, $this->data);

    }

    public function delete($skuToDelete){
        $this->$query = "DELETE FROM book where sku in ?";
        $this->data = $skuToDelete;
        return $this->db->insert($this->query, $this->data);
    }

}

?>