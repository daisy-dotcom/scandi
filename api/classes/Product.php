<?php

require_once(__DIR__ . '\..\include\autoloader.php');

class Product implements DBQueries{

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
        /*
        New GET Query
        SELECT * FROM product
        LEFT JOIN dvd USING (sku)
        LEFT JOIN furniture USING (sku)
        LEFT JOIN book USING (sku); 
        */
        $book = new Book(0,0,0,0);
        $bookArray = $book->get();

        $furniture = new Furniture(0,0,0,0,0,0);
        $furnitureArray = $furniture->get();

        $dvd = new DVD(0,0,0,0);
        $dvdArray = $dvd->get();

        $result = array_merge($bookArray, $furnitureArray, $dvdArray);

        usort($result, array($this, "cmp"));
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

    public function delete($skuToDelete){
        /*Move DELETE queries here
        $book = new Book(0,0,0,0);
        $result = $book->delete($skuToDelete);
        //echo $result . "\n";

        $furniture = new Furniture(0,0,0,0,0,0);
        $result = $furniture->delete($skuToDelete);
        //echo $result . "\n";

        $dvd = new DVD(0,0,0,0);
        $result = $dvd->delete($skuToDelete);
        //echo $result . "\n"; */

        $this->query = "DELETE FROM product where sku in ";
        $this->data = $skuToDelete;
        return $this->db->delete($this->query, $this->data);
    }

}
?>