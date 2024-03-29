<?php

require_once(__DIR__ . '/../include/autoloader.php');

class Book extends Product{

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

    public function insert(){
        $this->query = "INSERT INTO book(sku, weight) values(:sku, :weight)";
        $this->data = [
            'sku' => $this->getSKU(), 
            'weight' => $this->getWeight()
        ];
        return $this->db->insert($this->query, $this->data);

    }

}

?>