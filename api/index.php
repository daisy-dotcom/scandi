<?php 
header("Access-Control-Allow-Origin: *");

require_once('include/autoloader.php');

$products = array(
    'Product' => [$_REQUEST['sku'],$_REQUEST['name'],
    $_REQUEST['price']],

    'Book' => [$_REQUEST['sku'],$_REQUEST['name'],
    $_REQUEST['price'],$_REQUEST['weight']],

    'Furniture' => [$_REQUEST['sku'],$_REQUEST['name'], 
    $_REQUEST['price'],$_REQUEST['length'],$_REQUEST['width'],
    $_REQUEST['height']],

    'DVD' => [$_REQUEST['sku'],$_REQUEST['name'],
    $_REQUEST['price'],$_REQUEST['size']]
);

  echo var_dump($_REQUEST);
  //$classStr = $products[$_REQUEST['productType']];
  $classStr = $_REQUEST['productType'];
  echo var_dump($classStr);
  echo __DIR__;
  $item = new $classStr;
  echo $item;
  echo __DIR__;


switch($_REQUEST['request']){
  case 'get':
    echo $item.get();
    break;
  case 'insert':
    echo $item.insert();
    break;
  case 'delete':
    echo item.delete();
    break;
}

?>