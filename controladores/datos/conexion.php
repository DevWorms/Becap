<?php
    require_once dirname(__FILE__) . "/login.php";
    
    class Conectar{
        function __construct(){
            try{
                self::get_conexion();
            } catch (PDOException $e) {
                die("Error " . $e->getMessage() . "\nLinea de error: " . $e->getLine());
            }
        }
  
        public static function get_conexion(){
            
            $conexion = new PDO(
                                'mysql:host =' . NOMBRE_HOST   . ';' .
                                'dbname ='     . BASE_DE_DATOS . ';' ,
                                                 USUARIO, 
                                                 CONTRASENA
                               );
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");

            return $conexion;
        }
    }                            
?>