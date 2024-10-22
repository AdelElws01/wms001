<?php

    if(!isset($_GET['controlador'])){
        require_once "Controllers/login.php";
        $controlador= new LoginControlador();
        call_user_func(array($controlador,"login"));
    }else{
        $controlador=$_GET['controlador'];
        require_once "Controllers/$controlador.php";
        $controlador=ucwords($controlador)."Controlador";
        $controlador= new $controlador();
        $accion=isset($_GET['accion'])?$_GET['accion']:"inicio";
        call_user_func(array($controlador,$accion));
    }