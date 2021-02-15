<?php
 
require __DIR__ . '/bootstrap.php';
 
use Src\Route as Route;
 
$request = new Src\Request;
 
Route::resolve($request);