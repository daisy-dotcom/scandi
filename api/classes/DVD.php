<?php

namespace api;

class DVD extends Product implements CRUD{

    public function __construct($sku, $name, $price, $size){
        parent::__construct($sku, $name, $price);
        $this->size = $size;
    }

    public function getSize(){
        return this->size
    }

    public function setSize($size){
        $this->size = $size;   
    }

    public function get(){

    }

    public function insert(){

    }

    public function delete(){

    }
    
}

?>