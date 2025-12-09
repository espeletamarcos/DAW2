<?php
namespace clases\database;

use mysqli;
use mysqli_sql_exception;

class Database {

    /**
     * @var Database|null
     */

    private static ?Database $instance = null;
    private ?mysqli $con;
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
            $this->con = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        } catch(mysqli_sql_exception $e) {
            $this->con = null;
            die ("Error: ".$e->getMessage()."</br>");
        }
    }

    public static function getInstance(): Database {
        if(self::$instance ==null){
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getCon(): ?mysqli
    {
        return $this->con;
    }

    public function getAllTables(){
        $sentencia = "show tables";
        $res = $this->con->query($sentencia);
        $fila = $res->fetch_row();

        $tables = [];

        while($fila){
            $tables[] = $fila[0];
            $fila = $res->fetch_row();
        }

        return $tables;
    }

    public function getTableRows(string $tabla){
        $sentencia = "SELECT * FROM $tabla";
        $res = $this->con->query($sentencia);
        $filas = [];
        $fila = $res->fetch_row();
        while($fila){
            $filas[] = $fila;
            $fila = $res->fetch_row();
        }

        return $filas;
    }

    public function getTableColumns(string $tabla){
        $sentencia = "DESCRIBE $tabla";
        $res = $this->con->query($sentencia);
        $columnas = [];
        $columna = $res->fetch_row();
        while($columna){
            $columnas[] = $columna[0];
            $columna = $res->fetch_row();
        }

        return $columnas;
    }

    /**
     * @param string $usuario
     * @param string $password
     * @return bool|string con el error de la no inserción
     */

    public function registrarse(string $usuario, string $password):bool|string{
        $sentencia = "INSERT INTO usuarios (nombre, password) VALUES ('$usuario', '$password')";
        try {
            $res = $this->con->query($sentencia);
            if($res){
                return true;
            } else {
                return "No se ha podido insertar el usuario";
            }
        } catch (mysqli_sql_exception $e) {
            return "Error insertando usuario $usuario ".$e->getMessage();
        }
    }

    public function validar_usuario(string $usuario, string $password):bool|string{
        $sentencia = "SELECT * FROM usuarios WHERE nombre = '$usuario' and password = '$password'";
        try {
            $res = $this->con->query($sentencia);
            if($res->num_rows > 0){
                return true;
            }
            return "El usuario no existe en la base de datos";
        } catch (mysqli_sql_exception $e) {
            return "Error validando usuario $usuario ".$e->getMessage();
        }
    }
}

?>
