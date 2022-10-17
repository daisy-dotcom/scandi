<?php 
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: *');

require_once(__DIR__ .'\include\autoloader.php');

switch($_SERVER['REQUEST_METHOD']){
  case 'GET':
    echo "GET REQUEST \n " ;
    break;
  case 'POST':
    $class = new ReflectionClass($_REQUEST['productType']);
    $item = $class->newInstanceArgs($_REQUEST['args']);
  
    $productInstance = new ReflectionClass('Product');
    $product = $productInstance->newInstanceArgs(array($_REQUEST['args']['sku'],
    $_REQUEST['args']['name'], $_REQUEST['args']['price']));

    $productResult = $product->insert();
    $result = $item->insert();
    var_dump($result);
    break;
    
  case 'DELETE':
    $data = json_decode(file_get_contents("php://input"));

    $productInstance = new ReflectionClass('Product');
    $product = $productInstance->newInstanceArgs(array($data->args->sku,$data->args->name,
    $data->args->price));
    
    $result = $product->delete($data->skuToDelete);
    break;
}

?>