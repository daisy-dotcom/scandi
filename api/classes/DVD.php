<?php

namespace api;

class DVD extends Product implements CRUD{

    public function __construct($sku, $name, $price, $size){
        parent::__construct($sku, $name, $price);
        setSize($size);
    }

    public function getSize(){
        return $this->size;
    }

    public function setSize($size){
        $this->size = $size;   
    }

    public function get(){
        $this->$query = "SELECT * FROM product join dvd using (sku)";
        //$this->data = [getSKU(), getName(), getPrice(), getSize()];
        return $this->db->get($query);

    }

    public function insert(){
        $this->$query = "INSERT INTO dvd(sku, size) values (?, ?)";
        $this->data = [
            'sku' => getSKU(), 
            'size' => getSize()
        ];
        return $this->db->insert($query, $data);
    }

    public function delete($skuToDelete){
        $this->$query = "DELETE FROM dvd where sku in ?";
        $this->data = $skuToDelete;
        return $this->db->insert($query, $data);

    }
    
}

?>