<?php

namespace App\Controllers;


class Main_Controller
{


    protected $model_object;
    protected $page;
    protected $header;
    protected $title;
    protected $left_content;
    protected $content;
    protected $menu;
    protected $keywords;
    protected $description;
    protected $scripts;
    protected $footer;
    protected $user_model_object;
    protected $params;
    protected $controller;
    protected $navigation;

    protected function input($params = array()){
        //будет определана в классах наследниках
    }

    protected function output(){
        //будет определана в классах наследниках
    }

    protected function request($params = array()){
        $this->input($params);
        $this->output();
        $this->show_page();
    }

    public function route(){
        if(class_exists($this->controller)){
            $controller = new $this->controller();
            $controller->request($this->params);
        }
    }

    protected function render($vars = array(),$path){
        if(count($vars) > 0){
            extract($vars);
        }
        ob_start();

        require_once $path.'.php';


        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    protected function show_page(){
        echo $this->page;
    }


}