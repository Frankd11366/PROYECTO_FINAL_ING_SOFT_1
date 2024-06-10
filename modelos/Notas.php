<?php
require_once 'Conexion.php';

class Notas extends Conexion{
    public $nota_id;
    public $nota_alumno_id;
    public $nota_materia_id;
    public $nota;
    public $nota_situacion;


    public function __construct($args = [])
    {
        $this->nota_id = $args['nota_id'] ?? '';
        $this->nota_alumno_id = $args['nota_alumno_id'] ?? '';
        $this->nota_materia_id = $args['nota_materia_id'] ?? '';
        $this->nota = $args['nota'] ?? '';
        $this->nota_situacion = $args['nota_situacion'] ?? null;


    }
        // INSERTAR
      public function guardar(){
        $sql = "INSERT INTO Notas (nota_alumno_id, nota_materia_id, nota) values ('$this->nota_alumno_id', '$this->nota_materia_id', '$this->nota')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }


    public function buscarId($id){
        $sql = " SELECT * FROM notas WHERE nota_situacion = 1 AND nota_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;

        return $resultado;
    }

    public function promedio($nota){
        $sql = " SELECT * FROM notas WHERE nota_situacion = 1 AND nota = '$nota' ";
        $resultado = self::servir($sql);
        
        return $resultado;
    }

}
