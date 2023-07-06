<?php
require_once 'Conexion.php';

class Visita extends Conexion
{
    public $ID;
    public $nombre;
    public $dpi;
    public $hora_ingreso;
    public $hora_salida;
    public $situacion;

    public function __construct($args = [])
    {
        $this->ID = $args['ID'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->dpi = $args['dpi'] ?? '';
        $this->hora_ingreso = $args['hora_ingreso'] ?? '';
        $this->hora_salida = $args['hora_salida'] ?? '';
        $this->situacion = $args['situacion'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO viviendas(nombre, dpi, hora_ingreso, hora_salida, situacion) VALUES ('$this->nombre', '$this->dpi', '$this->hora_ingreso', '$this->hora_salida', '$this->situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * FROM viviendas WHERE situacion = 1";

        if ($this->nombre != '') {
            $sql .= " AND nombre LIKE '%$this->nombre%'";
        }
        if ($this->dpi != '') {
            $sql .= " AND dpi LIKE '%$this->dpi%'";
        }

        if ($this->hora_ingreso != '') {
            $sql .= " AND hora_ingreso LIKE '%$this->hora_ingreso%'";
        }
        if ($this->hora_salida != '') {
            $sql .= " AND hora_salida LIKE '%$this->hora_salida%'";
        }


        if ($this->situacion != '') {
            $sql .= " AND situacion = '$this->situacion'";
        }

        if ($this->ID != null) {
            $sql .= " AND gra_id = $this->ID";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE viviendas SET nombre = '$this->nombre', dpi = '$this->dpi', hora_ingreso = '$this->hora_ingreso',hora_salida = '$this->hora_salida', situacion = '$this->situacion' WHERE ID= '$this->ID'";
        // echo $sql;
    
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "UPDATE viviendas SET situacion = '0' WHERE ID = $this->ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
