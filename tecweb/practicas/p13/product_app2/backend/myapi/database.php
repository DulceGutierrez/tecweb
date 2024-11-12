<?php
namespace TECWEB\MYAPI;

abstract class DataBase {
    protected $conexion;

    public function __construct($host = 'localhost', $user = 'root', $password = 'Retosvergas10*', $db = 'marketzone') {
        $this->conexion = @mysqli_connect($host, $user, $password, $db);

        if (!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
    }

    abstract protected function query($sql);
}
?>
