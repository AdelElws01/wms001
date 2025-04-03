<?php

class CerrarControlador{

    private $modelo;
    
    public function __CONSTRUCT(){
        //$this->modelo= new Producto();
    }
    public function inicio(){
        
       // echo 'login';
       $conexion=DataBase::Conectar();

       require_once "Views/Cerrar/cerrar.php";
       require_once "Views/menu_lateral.php";
    }
}

 