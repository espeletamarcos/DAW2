<?php
namespace clases;

use mysqli;
use mysqli_sql_exception;

class BaseDeDatos {
    private static ?BaseDeDatos $instance = null;
    private ?mysqli $connection;
    private string $hostname;
    private string $username;
    private string $password;
    private string $database;

    private function __construct(
    ) {
        $this->hostname = $_ENV["DB_HOST"];
        $this->username = $_ENV["DB_USER"];
        $this->password = $_ENV["DB_PASSWORD"];
        $this->database = $_ENV["DB_NAME"];

        try {
            $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        } catch(mysqli_sql_exception $e) {
            $this->connection = null;
            die ("Error: ".$e->getMessage()."</br>");
        }
    }

    public static function getInstance(): BaseDeDatos {
        if(self::$instance ==null){
            self::$instance = new BaseDeDatos();
        }

        return self::$instance;
    }

    public function getConnection(): ?mysqli {
        return $this->connection;
    }

    public function registrarUsuario($nombre, $password) {
        $sentencia = "INSERT INTO usuarios (nombre, password) VALUES ('$nombre', '$password')";
        try {
            $response = $this->connection->query($sentencia);

            if($response){
                return true;
            } else {
                return "No se ha podido registrar al usuario";
            }
        } catch (mysqli_sql_exception $e) {
            $mensajeError = match ($e->getCode()) {
                1062 => "El usuario introducido ya existe",
                default => "Error insertando al usuario: $nombre, Error: ".$e->getMessage()
            };

            return $mensajeError;
        }
    }

    public function comprobarUsuario($nombre, $password) {
        $sentencia = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND password = '$password'";
        try {
            $response = $this->connection->query($sentencia);
            if($response){
                return $response->fetch_assoc();
            } else {
                return "No se ha podido comprobar el usuario";
            }
        } catch (mysqli_sql_exception $e) {
            return "Error comprobando el usuario: $nombre, Error: ".$e->getMessage();
        }
    }
}
?>