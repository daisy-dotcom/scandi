<?php 
header("Access-Control-Allow-Origin: *");

require_once(__DIR__ .'\include\autoloader.php');

  #echo var_dump($_REQUEST);
  //$classStr = $products[$_REQUEST['productType']];
  $class = new ReflectionClass($_REQUEST['productType']);
  $item = $class->newInstanceArgs($_REQUEST['args']);

  $productInstance = new ReflectionClass('Product');
  $product = $productInstance->newInstanceArgs(array($_REQUEST['args']['sku'],
  $_REQUEST['args']['name'], $_REQUEST['args']['price']));

switch($_REQUEST['request']){
  case 'get':
    echo $item->get();
    break;
  case 'insert':
    $productResult = $product->insert();
    $result = $item->insert();
    var_dump($result);
    break;
  case 'delete':
    $result = $item->delete($_REQUEST['skuToDelete']);
    #echo $item->delete();
    echo $result;
    break;
}

?>