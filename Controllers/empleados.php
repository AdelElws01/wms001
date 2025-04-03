<?php

class EmpleadosControlador{

    private $modelo;
    
    public function __CONSTRUCT(){
        //$this->modelo= new Producto();
    }
    public function inicio(){
        
       // echo 'login';
       $conexion=DataBase::Conectar();

       
       require_once "Models/zona_horaria.php";
       require_once "Views/menu_lateral.php";
       require_once "Views/Empleados/empleados.php";
       require_once "Views/header_tabla.php";
       require_once "Views/footer_tabla.php";

    }
}

 