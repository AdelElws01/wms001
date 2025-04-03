<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location:');
    exit;
}


$id_usuario = $_SESSION['usuario'];
$query = "SELECT * FROM tb_login_usuarios WHERE id_login_usuarios='$id_usuario'";
$resultado = $conexion->query($query);
$row = $resultado->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Libraries/css/bootstrap_53/css/bootstrap.min.css">
    <script src="Libraries/js/bootstrap_53/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="Libraries/js/jquery-3.7.1.js"></script>
    <link rel="shortcut icon" href="Assets/img/Icono.jpg">
    <link rel="stylesheet" href="Libraries/css/index.css">
    <link href="Libraries/js/datatable/datatables.css" rel="stylesheet">
    <script src="Libraries/js/datatable/datatables.js"></script>
   
    <link rel="stylesheet" href="Assets/icons/fontawesome-icons/css/all.css">
    <link rel="stylesheet" href="Assets/icons/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Libraries/css/main.css">
    <link rel="stylesheet" href="Libraries/css/menu.css">
  
   
   
</head>
<body>
    <div class="page-wrapper default-theme sidebar-bg bg1 toggled">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-item sidebar-brand">
                    <a><?php echo $row['nombre']; ?></a>
                </div>
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li>
                            <a href="?controlador=principal">
                                <i class="bi bi-house-door-fill"></i> Inicio
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="bi bi-person-vcard-fill"></i> Recursos Humanos
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="?controlador=empleados">Empleados</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="?controlador=usuarios">
                                <i class="bi bi-people-fill"></i> Usuarios
                            </a>
                        </li>
                    </ul>
                    <br>
                    <?php $year = date("Y"); ?>
                    <center>
                	    <font color="Gray">&#169;<?php echo $year; ?> IBCS. Copyright.</font>
                	</center>
                </div>
            </div>
            <div class="sidebar-footer">
                <div>
                    <a href="?controlador=cerrar">
                        <button type="button" class="btn btn-danger btn-sm">Cerrar Sesi&oacute;n</button>
                    </a>
                </div>
            </div>
        </nav>
       <main class="page-content pt-2">
            <div id="overlay" class="overlay"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-md-12">
                        <a id="toggle-sidebar" class="btn btn-secondary rounded-0" href="#">
                            <i class="bi bi-list"></i>
                        </a>
                    </div>
                </div>
            </div>
    
    
    <script src="Libraries/js/menu.js"></script>
</body>
</html>
