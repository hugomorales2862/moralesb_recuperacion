<?php
require_once 'Conexion.php';
class Asignar extends Conexion {
    public $ID;
    public $visita;
    public $vivienda;
    public $situacion;

    public function __construct($args = []) {
        $this->ID = $args['ID'] ?? null;
        $this->visita = $args['visita'] ?? '';
        $this->vivienda = $args['vivienda'] ?? '';
        $this->situacion = $args['situacion'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO visita_vivienda(visita, vivienda, situacion) 
                VALUES ('$this->visita', '$this->vivienda', '$this->situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    


    public function buscar() {
        $sql = "SELECT ID, visita, vivienda, situacion FROM visita_vivienda";

        if ($this->ID != null) {
            $sql .= " WHERE ID = $this->ID";
        }

        if ($this->visita != '') {
            $sql .= " AND visita LIKE '%$this->visita%'";
        }

        if ($this->vivienda != '') {
            $sql .= " AND vivienda LIKE '%$this->vivienda%'";
        }

        if ($this->situacion != '') {
            $sql .= " AND situacion = '$this->situacion'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar() {
        $sql = "UPDATE visita 
                SET visita = '$this->visita', vivienda = '$this->vivienda', 
                    situacion = '$this->situacion' 
                WHERE ID = $this->ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM visita WHERE ID = $this->ID";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
