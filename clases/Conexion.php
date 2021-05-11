<?php
namespace Clases;
use PDO;
use PDOException;

class Conexion {
    protected static $conexion;

    public function __construct()
    {
        if (self::$conexion==null) {
            self::crearConexion();
        }
    }

    private static function crearConexion() {
        $opciones=parse_ini_file("../.conf");
        $base=$opciones["base"];
        $pass=$opciones["pass"];
        $user=$opciones["usuario"];
        $host=$opciones["host"];

        //Creamos el dsn
        $dsn="mysql:host=$host;dbname=$base;charset=utf8mb4";
        try {
            self::$conexion=new PDO($dsn, $user, $pass);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Error al conectar con la base de datos, ".$ex->getMessage());
        }
    }
}