<?php

class PrincipalControlador{

    private $modelo;
    
    public function __CONSTRUCT(){
        //$this->modelo= new Producto();
    }
    public function inicio(){
        
       // echo 'login';
       $conexion=DataBase::Conectar();

       require_once "Views/Principal/principal.php";
       require_once "Views/menu_lateral.php";
      // require_once "Views/footer.php";

    }
}

 