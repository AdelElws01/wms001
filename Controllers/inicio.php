<?php

class InicioControlador{

    private $modelo;
    
    public function __CONSTRUCT(){
        //$this->modelo= new Producto();
    }
    public function inicio(){
        
       // echo 'login';
       $conexion=DataBase::Conectar();

       require_once "Views/Login/login.php";
       require_once "Views/Login/header.php";
       require_once "Views/Login/footer.php";

    }
}

 