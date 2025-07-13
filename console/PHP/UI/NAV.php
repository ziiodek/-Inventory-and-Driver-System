<?php
include ('OPTION.php');

class Nav{
public $dashboard;
public $brands;
public $merchandise;
public $cargo;
public $places;
public $ports;
public $customers;
public $drivers;
public $trailers;
public $trucks;
public $shipping;


public $nav_options = array();

function initNav(){
    $this->dashboard=new Option();
    $this->dashboard->initOption("dashboard",
    "dashboard",
    "records",
    "grid");

    $this->brands = new Option();
        $this->brands->initOption("brands",
        "brands",
        "records",
        "grid"
        );

    $this->merchandise = new Option();
        $this->merchandise->initOption("merchandise",
        "merchandise",
        "records",
        "grid"
        
        );
        
    $this->cargo = new Option();
        $this->cargo->initOption("cargo",
        "cargo",
        "records",
        "grid"
            
            );

    $this->places = new Option();
        $this->places->initOption("places",
        "places",
        "records",
        "grid"
        );

    $this->ports = new Option();
        $this->ports->initOption("ports",
        "ports",
        "records",
        "grid"   
        );


    $this->customers = new Option();
        $this->customers->initOption("customers",
        "customers",
        "records",
        "grid"
        );

    $this->drivers = new Option();
        $this->drivers->initOption("drivers",
        "drivers",
        "records",
        "grid"    
        );

    $this->trailers = new Option();
        $this->trailers->initOption("trailers",
        "trailers",
        "records",
        "grid"
        );


    $this->trucks = new Option();
        $this->trucks->initOption("trucks",
        "trucks",
        "records",
        "grid"    
        );

    $this->shipping = new Option();
        $this->shipping->initOption("shipping",
        "shipping",
        "records",
        "grid"
        );


        $this->nav_options[0] =$this->dashboard;
        $this->nav_options[1] =$this->brands;
        $this->nav_options[2] =$this->merchandise;
        $this->nav_options[3] =$this->cargo;
        $this->nav_options[4] =$this->places;
        $this->nav_options[5] =$this->ports;
        $this->nav_options[6] =$this->customers;
        $this->nav_options[7] =$this->drivers;
        $this->nav_options[8] =$this->trailers;
        $this->nav_options[9] =$this->trucks;
        $this->nav_options[10] =$this->shipping;

      
}

function loadNavOptions(){
    $this->loadNavOptionsHelper(0,$this->nav_options);
    

}

function loadNavOptionsHelper($index,$options){

if($index >= count($options)){
return -1;
}

echo "<a href='index.php?layout=".$this->nav_options[$index]->layout."&model=".$this->nav_options[$index]->model."&action=".$this->nav_options[$index]->action."'>
    <li>".$this->nav_options[$index]->name."</li></a>";

$index+=1;
return  $this->loadNavOptionsHelper($index,$options);

}

}
?>