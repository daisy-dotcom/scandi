<?php 

spl_autoload_register('autoLoader');

function autoLoader($className){

    #echo $className . "\n";

    #$dir = dirname(__DIR__, 1);
    #$path = $dir . "\classes\\";
    $ext = ".php";

    $path = __DIR__ . "\..\\" . "classes\\";

    $fullPath = $path . $className . $ext;

    #echo $fullPath . "\n";

    if(file_exists($fullPath)){
        include $fullPath;
    }
    else{
        echo "Does not exist \n";
    }
    

    clearstatcache();
}

?>