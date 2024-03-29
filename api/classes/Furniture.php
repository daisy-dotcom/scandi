<?php

require_once(__DIR__ . '\..\include\autoloader.php');

class Furniture extends Product{

    public function __construct($sku, $name, $price, $length, $width, $height){
        parent::__construct($sku, $name, $price);
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height); 
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
        $this->height = $height;
    }

    public function insert(){
        $this->query = "INSERT INTO furniture(sku, length, width, height) values (:sku, :length, :width, :height)";
        $this->data = [
            'sku' => $this->getSKU(), 
            'length' => $this->getLength(), 
            'width' => $this->getWidth(), 
            'height' => $this->getHeight()
        ];
        return $this->db->insert($this->query, $this->data);

    }
    
}

?>