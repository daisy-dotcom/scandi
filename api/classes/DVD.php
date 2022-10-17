<?php

require_once(__DIR__ . '\..\include\autoloader.php');

class DVD extends Product implements DBQueries{

    public function __construct($sku, $name, $price, $size){
        parent::__construct($sku, $name, $price);
        $this->setSize($size);
    }

    public function getSize(){
        return $this->size;
    }

    public function setSize($size){
        $this->size = $size;   
    }

    public function get(){
        $this->query = "SELECT * FROM product join dvd using (sku)";
        return $this->db->get($this->query);

    }

    public function insert(){
        $this->query = "INSERT INTO dvd(sku, size) values (:sku, :size)";
        $this->data = [
            'sku' => $this->getSKU(), 
            'size' => $this->getSize()
        ];
        return $this->db->insert($this->query, $this->data);
    }

    public function delete($skuToDelete){
        $this->query = "DELETE FROM dvd where sku in ";
        $this->data = $skuToDelete;
        return $this->db->delete($this->query, $this->data);

    }
    
}

?>