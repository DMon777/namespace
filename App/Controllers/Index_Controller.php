<?php
namespace App\Controllers;


class Index_Controller extends Base_Controller
{

    protected function input($params = array()){
        parent::input();
        $this->scripts = array('jQuery');

    }

    protected function output(){

        $this->content = $this->render(array(),'App/Views/blocks/index_content');
        $this->page = parent::output();
    }

}