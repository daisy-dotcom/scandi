<?php

namespace api;
use api/Database;

class Product{

    public function __construct($sku, $name, $price){
        setSKU($sku);
        setName($name);
        setPrice($price);
        $this->db = new Database();
    }

    public function getSKU(){
        return $this->sku;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setSKU($sku){
        $this->sku = $sku;
    }

    public function setName($name){
        $this->name = $name;
    }
    public function setPrice($price){
        $this->price = $price;
    }

}
?>