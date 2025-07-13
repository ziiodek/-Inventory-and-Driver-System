<?php
class Option{

public $name;
public $model;
public $action;
public $layout;

function initOption($name,$model,$action,$layout){
$this->name = $name;
$this->model = $model;
$this->action = $action;
$this->layout = $layout;
}


}


?>