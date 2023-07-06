<?php
require_once 'Conexion.php';
class asignar extends Conexion {
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
    
    public function inf(){
        $sql ="SELECT visita_vivienda.id, nombre AS visitante, dpi, nombre_condominio AS condominio, 
        numero_vivienda, propietaria, hora_ingreso, hora_salida 
 FROM visita_vivienda 
 INNER JOIN visitas ON visita_vivienda.visita = visitas.id 
 INNER JOIN viviendas ON visita_vivienda.vivienda = viviendas.id 
 ORDER BY hora_ingreso;";

        $resultado = self::servir($sql);
        return $resultado;
    } 

    public function buscar() {
        $sql = "SELECT v.nombre AS nombre_visitante, vi.nombre_condominio, vi.numero_vivienda, vi.propietaria
                FROM visita_vivienda vv
                INNER JOIN visitas v ON vv.visita = v.ID
                INNER JOIN viviendas vi ON vv.vivienda = vi.ID
                WHERE v.nombre LIKE '%HUGO%' AND vv.situacion = '1'";
    
        // echo $sql;
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
