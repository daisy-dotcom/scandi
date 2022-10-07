<?php 

//  ----------------- TEST ----------------
/*
 
*/

const $products = [
    'Product' => "Product({$_REQUEST['sku']},{$_REQUEST['name']},
    {$_REQUEST['price']})",

    'Book' => "Book({$_REQUEST['sku']},{$_REQUEST['name']},
    {$_REQUEST['price']},{$_REQUEST['weight']})",

    'Furniture' => "Furniture({$_REQUEST['sku']},{$_REQUEST['name']},
    {$_REQUEST['price']},{$_REQUEST['length']},{$_REQUEST['width']},
    {$_REQUEST['height']})",

    'DVD' => "DVD({$_REQUEST['sku']},{$_REQUEST['name']},
    {$_REQUEST['price']},{$_REQUEST['size']})"
];

/*
  $classStr = 'C';
  $e = new $classStr;
  print get_class($e);
*/

?>