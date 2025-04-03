<?php

class UsuariosControlador{

    private $modelo;
    
    public function __CONSTRUCT(){
        //$this->modelo= new Producto();
    }
    public function inicio(){
        
       // echo 'login';
       //$pdo=DataBase::connect();
       $conexion=DataBase::Conectar();
       $query_registros="SELECT * FROM `tb_login_usuarios` ORDER BY id_login_usuarios DESC";
       $resultado_registros=$conexion->query($query_registros);
       require_once "Models/zona_horaria.php";
       require_once "Views/menu_lateral.php";
       require_once "Views/header_tabla.php";
       require_once "Views/Usuarios/usuarios.php";
       require_once "Views/footer_tabla.php";
       
    }

    public function agregar(){                                                 
        try {
           
            $pdo=DataBase::connect();
            $conexion=DataBase::Conectar();
            require_once "Models/zona_horaria.php";
            require_once "Views/menu_lateral.php";

            //folio autoincrementable
            $queryfolio = "SELECT folio FROM tb_login_usuarios ORDER BY id_login_usuarios DESC LIMIT 1";
            $resultadofolio = $conexion->query($queryfolio);
            while ($rowfolio = $resultadofolio->fetch_assoc())
                $lastid = $rowfolio['folio'];
            if ($lastid == "") {
                $folid = "USR-1";
            } else {
                $folid = substr($lastid, 4);
                $folid = intval($folid);
                $folid = "USR-" . ($folid + 1);
            }
            //encripta correo
            $correo = $_POST['correo'];
            $clave = "IBCS_EMAILS";
            $metodo = "AES-256-CBC";
            $correo_encriptado = openssl_encrypt($correo, $metodo, $clave, 0, 'IBCSVECTOREMAILS');
            //encripta contraseña
            $pass = $_POST['password'];    
            $passHash = password_hash($pass, PASSWORD_BCRYPT);
    
            $queryAgregar=$pdo->prepare("INSERT INTO `tb_login_usuarios`( `folio`, `nombre`, `correo`, `contrasena`, `usuario`, `fecha`, `hora`)
            VALUES (:folio,:nombre,:correo,:pass,:usuario,:fecha,:hora)");
            //
            //
            $resAgregar=$queryAgregar->execute(array(
            "folio"=>$folid,
            "nombre"=>$_POST['nombre'],
            "correo"=>$correo_encriptado,
            "pass"=>$passHash,
            "usuario"=>$id_usuario,
            "fecha"=>$fecha,
            "hora"=>$hora
            ));
           // echo json_encode($rowfolio);
            echo json_encode(['success' => true, 'message' => 'Usuario agregado correctamente.','folio'=>$folid]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error al agregar el usuario: ' . $e->getMessage()]);
        }

       
    }

    public function eliminar(){
        try {
            $pdo=DataBase::connect();
            $conexion=DataBase::Conectar();
            require_once "Models/zona_horaria.php";
            require_once "Views/menu_lateral.php";
            $id_eliminar = $_POST['id'];

            $query_select="SELECT * FROM `tb_login_usuarios` WHERE id_login_usuarios='$id_eliminar'";
            $resultado_select = $conexion->query($query_select);
            $row_select = $resultado_select->fetch_assoc();
            $v1=$row_select['id_login_usuarios'];
            $v2=$row_select['folio'];
            $v3=$row_select['nombre'];
            $v4=$row_select['correo'];
            $v5=$row_select['contrasena'];
            

            $query_movimiento="INSERT INTO `tb_login_usuarios_movimientos`( `id_login_usuarios`, `movimiento`, `folio`, `nombre`, `correo`, `contrasena`, `usuario`, `fecha`, `hora`)
                                                                    VALUES ('$v1','ELIMINAR','$v2','$v3','$v4','$v5','$id_usuario','$fecha','$hora')";
            $resultado_movimiento = $conexion->query($query_movimiento);
            
            if($resultado_movimiento){
                $query_delete = "DELETE FROM `tb_login_usuarios` WHERE id_login_usuarios='$id_eliminar'";
                $resultado_delete = $conexion->query($query_delete);
                if($resultado_delete){
                    echo json_encode(['success' => true, 'message' => 'Usuario agregado correctamente.']);
                }else{
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar usuario.']); 
                }
            }else{
                echo json_encode(['success' => false, 'message' => 'Error al eliminar usuario.']); 
            }
        } catch(PDOException $e){
            echo json_encode(['success' => false, 'message' => 'Error al agregar el usuario: ' . $e->getMessage()]);
        }
    }

    public function formAgregar(){
       $conexion=DataBase::Conectar();
       
       require_once "Models/zona_horaria.php";
       require_once "Views/menu_lateral.php";
       require_once "Views/Usuarios/usuarios_from.php";
       
    }

    
}

 