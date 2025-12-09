<?php

namespace clases\database;

use mysqli;
use mysqli_sql_exception;

class Database {
    private mysqli|null $con;
    private string $host;
    private string $username;
    private string $password;
    private string $database;
    private static ?Database $instance = null;

    private function __construct(
    ) {
        $this->host = $_ENV["HOST"];
        $this->username = $_ENV["DB_USER"];
        $this->password = $_ENV["PASSWORD"];
        $this->database = $_ENV["DATABASE"];
        $this->con = new mysqli($this->host, $this->username, $this->password, $this->database);
    }

    public function getCon(): ?mysqli
    {
        return $this->con;
    }

    // Ya que no queremos tener más de una instancia de esta clase, lo hacemos estático y que sólo podamos tener una instancia, por eso hacemos privado el constructor
    public static function getInstance(): Database {
        if(self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getAllTables(): array {
        $sentencia = "show tables";
        $res = $this->con->query($sentencia);
        $fila = $res->fetch_row();
        $tables = [];

        while ($fila) {
            $tables[] = $fila[0];
            $fila = $res->fetch_row();
        }
        return $tables;
    }

    /**
     * @param string $table
     * @return array
     */
    public function getContentTable(string $table): array {
        $filas = [];
        $sentencia = "select * from $table";
        $res = $this->con->query($sentencia);


        while($fila) {
            $filas[] = $fila;
            $fila = $res->fetch_row();
        }
        return $filas;
    }

    public function getFieldName(string $tabla) {
        $sentencia = "desc $tabla";
        $res = $this->con->query($sentencia);
        $fila = $res->fetch_row();
        while($fila) {
            $filas = $fila[0];
        }
    }

    /**
     * @param string $usuario
     * @param string $password
     * @return bool | string con el error de la no inserción
     */
    public function registrar(string $usuario, string $password): bool {
        $sentencia = "insert into usuarios (nombre, password) values ('$usuario', '$password')";
        try {
            $res = $this->con->query($sentencia);
            if($res) {
                return true;
            }
            return "No se ha podido insertar el usuario";
        } catch (mysqli_sql_exception $e) {
            return "Error insertando usuario $usuario " . $e->getMessage();
        }
    }

    public function validar_usuario(string $usuario, string $password): bool | string {
        $sentencia = "select * from usuarios where nombre='$usuario' and password='$password'";
        $stmt = $this->con->prepare($sentencia);
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $stmt->store_result();
        try {
            $res = $this->con->query($sentencia);
            if(($res->num_rows) > 0)
                return true;
            return "El usuario no existe en la base de datos";
        } catch (mysqli_sql_exception $e) {
            return "Error logeando usuario $usuario " . $e->getMessage();
        }
    }
}

?>