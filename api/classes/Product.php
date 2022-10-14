<?php

/*require_once('Database.php');
require_once('Book.php');
require_once('DVD.php');
require_once('Furniture.php');*/
require_once('../include/autoloader.php');

class Product implements DBQueries{

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

    public function get(){
        /*$this->query = "SELECT * FROM product join book using (sku)";
        $productArray = $this->db->get($query);

        $this->query = "SELECT * FROM product join furniture using (sku)";
        $productArray = $productArray + $this->db->get($query);

        $this->query = "SELECT * FROM product join dvd using (sku)";
        $productArray = $productArray + $this->db->get($this->query);*/

        $book = new Book(0,0,0,0);
        $productArray = $book->get();

        $furniture = new Furniture(0,0,0,0,0,0);
        $productArray = $productArray + $furniture->get();

        $dvd = new DVD(0,0,0,0);
        $productArray = $productArray + $dvd->get();

        return $productArray;
    }

    public function insert(){
        $this->$query = "INSERT INTO product(sku, name, price) values (?, ?, ?)";
        $this->data = [
            'sku' => getSKU(), 
            'name' => getName(), 
            'price' => getPrice()
        ];
        return $this->db->insert($this->query, $this->data);
    }

    public function delete($skuToDelete){
        $this->$query = "DELETE FROM product where sku in ?";
        $this->data = $skuToDelete;
        return $this->db->insert($this->query, $this->data);
    }

}
?>