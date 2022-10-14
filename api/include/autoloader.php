<?php 

spl_autoload_register('autoLoader');

function autoLoader($className){
    $path = "C:\\xampp\htdocs\scandi\api\\classes\\";
    $ext = "php";
    $fullPath = $path . $className . $ext;

    if(!file_exists($fullPath)){
        echo 'Does not exist';
        echo __DIR__;
    }

    include $fullPath;
}

?>