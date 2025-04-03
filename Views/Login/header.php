<?php

session_start();

if (isset($_SESSION['usuario'])) {
    header('Location:?controlador=principal');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $clave = "IBCS_EMAILS";
    $metodo = "AES-256-CBC";
    $correo_encriptado = openssl_encrypt($correo, $metodo, $clave, 0, 'IBCSVECTOREMAILS');
    $db = new Database();
    $query = $db->connect()->prepare('SELECT * FROM tb_login_usuarios WHERE correo = :correo');
    $query->execute(['correo' => $correo_encriptado]);
    $row = $query->fetch(PDO::FETCH_NUM);
    if ($row == true) {
        $hash = $row[4];
        $contrasena = $_POST['contrasena'];
        if (password_verify($contrasena, $hash)) {
            $id_usr = $row[0];
            $_SESSION['usuario'] = $id_usr;
            header('Location:?controlador=principal');
            exit;
        } else {
            $error = 'Contrase&ntilde;a Incorrecta';
        }
    }else{
        $error = 'Correo Incorrecto';
    }
}

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Libraries/css/bootstrap_53/css/bootstrap.min.css">
    <link rel="shortcut icon" href="Assets/img/Icono.jpg">
    <link rel="stylesheet" href="Libraries/css/login.css">
    
</head>
<body>
    