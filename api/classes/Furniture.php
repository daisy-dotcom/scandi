<?php

require_once('../include/autoloader.php');

class Furniture extends Product implements DBQueries{

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
        $this->$query = "SELECT * FROM product join furniture using (sku)";
        return $this->db->get($this->query);

    }

    public function insert(){
        $this->$query = "INSERT INTO furniture(sku, length, width, height) values (?, ?, ?, ?)";
        $this->data = [
            'sku' => getSKU(), 
            'length' => getLength(), 
            'width' => getWidth(), 
            'height' => getHeight()
        ];
        return $this->db->insert($this->query, $this->data);

    }

    public function delete($skuToDelete){
        $this->$query = "DELETE FROM furniture where sku in ?";
        $this->data = $skuToDelete;
        return $this->db->insert($this->query, $this->data);
    }
    
}

?>