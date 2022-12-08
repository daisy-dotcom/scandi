<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: *');
  
  require_once(__DIR__ .'\include\autoloader.php');

  switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
      if($_GET['product'] == 'all'){
        $getProducts = new Product(0,0,0);
        $productArray = $getProducts->get();
        echo json_encode($productArray);
      }
      break;

    case 'POST':

        $class = new ReflectionClass($_REQUEST['productType']);
        $item = $class->newInstanceArgs($_REQUEST['args']);
      
        $productInstance = new ReflectionClass('Product');
        $product = $productInstance->newInstanceArgs(array($_REQUEST['args']['sku'],
        $_REQUEST['args']['name'], $_REQUEST['args']['price']));
  
        if ($product->insert() != 'DUPLICATE'){
          $result = $item->insert();
          echo $result;
        }
        else{
          echo 'DUPLICATE';
        }
        break;
        
      

    case 'DELETE':
      $data = json_decode(file_get_contents("php://input"));

      $productInstance = new ReflectionClass('Product');
      $product = $productInstance->newInstanceArgs(array($data->args->sku,$data->args->name,
      $data->args->price));
      
      $result = $product->delete($data->skuToDelete);
      echo $result;
      break;
  }

?>