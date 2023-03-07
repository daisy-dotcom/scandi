<?php

require_once(__DIR__ . '\..\include\autoloader.php');

class Product{

    public function __construct($sku, $name, $price){
        $this->setSKU($sku);
        $this->setName($name);
        $this->setPrice($price);
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

    public function cmp($a, $b){
        return $a['sku'] <=> $b['sku'];
    }

    public function get(){
        $this->query = "SELECT * FROM product ".
        "LEFT JOIN dvd USING (sku) ".
        "LEFT JOIN furniture USING (sku) ".
        "LEFT JOIN book USING (sku) ".
        "ORDER BY sku ";
        $result = $this->db->get($this->query);
        return $result;
    }

    public function insert(){
        $this->query = "INSERT INTO product(sku, name, price) values (:sku, :name, :price)";
        $this->data = [
            'sku' => $this->getSKU(), 
            'name' => $this->getName(), 
            'price' => $this->getPrice()
        ];
        return $this->db->insert($this->query, $this->data);
    }

    #on delete, cascade to book, dvd and furniture tables
    public function delete($skuToDelete){
        $this->query = "DELETE FROM product where sku in ";
        $this->data = $skuToDelete;
        return $this->db->delete($this->query, $this->data);
    }

}
?>