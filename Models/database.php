<?php


class DataBase{

    const servidor='localhost';
    const usuariodb='root';
    const password='';
    const nombredb='wms001';

    public static function  Conectar(){

        $conexion= new mysqli("localhost","root",'',"wms001");
        $conexion -> set_charset("utf8");
        return $conexion;

      /*  try{
            $conexion=new PDO('mysql:host='.self::servidor.";dbname=".self::nombredb.";charset=utf8",self::usuariodb,self::password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }catch(PDOException $e){
            return "ERROR EN CONEXION:".$e->getMessage();
        }

       /* try {
            
            $conexion= new mysqli(servidor,usuariodb,password,nombredb);
            $conexion -> set_charset("utf8");
            return $conexion;      
        } catch (Exception $e) {
            return "ERROR EN CONEXION:".$e->getMessage();
        }  */


    }

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'wms001';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }
    public static function connect(){
        try{
            $connection = "mysql:host=".self::servidor.";dbname=" .self::nombredb. ";charset=utf8" ;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, self::usuariodb,self::password, $options);
    
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}