<?php

spl_autoload_register('autoload');

function autoload($class) {

    $class = strtolower($class);

    $path = "includes/{$class}.php";

    if(file_exists($path)){
       
        include_once $path ;
    }else{
        die("{$class}.php not found");
    }
        
            
}