<?php
require_once 'Conexion.php';

class Vivienda extends Conexion
{
    public $ID;
    public $nombre_condominio;
    public $numero_vivienda;
    public $propietaria;
    public $situacion;

    public function __construct($args = [])
    {
        $this->ID = $args['ID'] ?? null;
        $this->nombre_condominio = $args['nombre_condominio'] ?? '';
        $this->numero_vivienda = $args['numero_vivienda'] ?? '';
        $this->propietaria = $args['propietaria'] ?? '';
        $this->situacion = $args['situacion'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO viviendas(nombre_condominio, numero_vivienda, propietaria, situacion) VALUES ('$this->nombre_condominio', '$this->numero_vivienda', '$this->propietaria', '$this->situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * FROM viviendas WHERE situacion = 1";

        if ($this->nombre_condominio != '') {
            $sql .= " AND nombre_condominio LIKE '%$this->nombre_condominio%'";
        }
        if ($this->numero_vivienda != '') {
            $sql .= " AND numero_vivienda LIKE '%$this->numero_vivienda%'";
        }

        if ($this->propietaria != '') {
            $sql .= " AND propietaria LIKE '%$this->propietaria%'";
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
        $sql = "UPDATE viviendas SET nombre_condominio = '$this->nombre_condominio', numero_vivienda = '$this->numero_vivienda', propietaria = '$this->propietaria', situacion = '$this->situacion' WHERE ID= '$this->ID'";
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
