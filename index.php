<?php
    
    
    require_once "Models/database.php";
    //require_once "Models/conexion.php";

    if(!isset($_GET['controlador'])){
        require_once "Controllers/inicio.php";
        $controlador= new InicioControlador();
        call_user_func(array($controlador,"inicio"));
    }else{
        $controlador=$_GET['controlador'];
        require_once "Controllers/$controlador.php";
        $controladoruc=ucwords($controlador)."Controlador";
        $controladoruc= new $controladoruc();
        $accion=isset($_GET['accion'])?$_GET['accion']:"inicio";
        call_user_func(array($controladoruc,$accion));
    }