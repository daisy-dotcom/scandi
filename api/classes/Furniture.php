<?php

namespace api;

class Furniture extends Product implements CRUD{

    public function __construct($sku, $name, $price, $length, $width, $height){
        parent::__construct($sku, $name, $price);
        setLength($length);
        setWidth($width);
        setHeight($height);
    }
    public function getLength(){
        return $this->length;
    }

    public function getWidth(){
        return $this->width;
    }

    public function getHeight(){
        return $this->height;
    }

    public function setLength($length){
        $this->length = $length;
    }

    public function setWidth($width){
        $this->width = $width;
    }
    public function setHeight($height){
        return $this->height;
    }

    public function get(){

    }

    public function insert(){

    }
    public function delete(){

    }
    
}

?>