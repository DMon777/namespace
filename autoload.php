<?php

function __autoload($class){
$class = str_replace("\\","/",$class);
require_once $class.'.php';
}




?>