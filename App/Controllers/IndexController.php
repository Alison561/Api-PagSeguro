<?php

namespace App\Controllers;

class indexController{

    public function index(){
        $this->render('index', 'template');
    }

    public function content(){
        include $this->view;
    }

    public function render($view, $template){
        $this->view = "App\\View\\www\\".$view.".php";
        include "App\\View\\".$template.".php";
    }
}