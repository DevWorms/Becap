<?php

    require_once 'login.php';


    class ConexionBD
    {

        private static $db = null;
        private static $pdo;

        final private function __construct()    {

            try {
                self::obtenerBD();

            } catch (PDOException $e) {

            }

        }


        public static function obtenerInstancia()   {

            if (self::$db === null) {
                self::$db = new self();

            }

            return self::$db;

        }


        public function obtenerBD()     {

            if (self::$pdo == null)     {
                self::$pdo = new PDO(
                    'mysql:dbname=' . BASE_DE_DATOS .
                    ';host=' . NOMBRE_HOST . ";",
                    USUARIO, CONTRASENA,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                );

                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }

            return self::$pdo;

        }

        final protected function __clone()      {

        }

        function _destructor()      {
            self::$pdo = null;

        }
}

?>