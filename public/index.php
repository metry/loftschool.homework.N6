<?php
//define path of application
define('APPLICATION_PATH', getcwd() . '/../app/');

//config
require_once APPLICATION_PATH . 'Core/config.php';

//composer psr-4 autoload
require_once APPLICATION_PATH . 'vendor/autoload.php';


try {
    $migration = new \App\Controllers\Migration;
    $migration->start();
    echo 'success';
} catch (Exception $e) {
    require APPLICATION_PATH . "errors/showError.php";
}
