<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', true);
 
define('url', 'http://localhost/api-pagseguro/');

try {
 
    require __DIR__ . '/routes/routes.php';
 
} catch(\Exception $e){
     
    echo $e->getMessage();
}