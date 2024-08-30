<?php

function load_core($classname) {
    $path_to_file = "../src/core/". $classname . ".php";

    if (file_exists($path_to_file)) {
        require_once $path_to_file;
    }
}   

spl_autoload_register('load_core');