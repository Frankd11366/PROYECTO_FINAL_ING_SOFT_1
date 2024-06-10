<?php
require_once 'Conexion.php';

class Alumnos extends Conexion{
    public $alumno_id;
    public $alumno_nombre1;
    public $alumno_nombre2;
    public $alumno_apellido1;
    public $alumno_apellido2;
    public $alumno_grado;
    public $alumno_arma_o_servicio;
    public $alumno_nacionalidad;
    public $alumno_situacion;

    public function __construct($args = [])
    {
        $this->alumno_id = $args['alumno_id'] ?? null;
        $this->alumno_nombre1 = $args['alumno_nombre1'] ?? '';
        $this->alumno_nombre2 = $args['alumno_nombre2'] ?? '';
        $this->alumno_apellido1 = $args['alumno_apellido1'] ?? '';
        $this->alumno_apellido2 = $args['alumno_apellido2'] ?? null;
        $this->alumno_grado = $args['alumno_grado'] ?? '';
        $this->alumno_arma_o_servicio = $args['alumno_arma_o_servicio'] ?? '';
        $this->alumno_nacionalidad = $args['alumno_nacionalidad'] ?? '';
        $this->alumno_situacion = $args['alumno_situacion'] ?? null;

       

    }
        // INSERTAR
      public function guardar(){
        $sql = "INSERT into alumnos (alumno_nombre1, alumno_nombre2, alumno_apellido1, alumno_apellido2, alumno_grado, alumno_arma_o_servicio, alumno_nacionalidad) values ('$this->alumno_nombre1', '$this->alumno_nombre2', '$this->alumno_apellido1', '$this->alumno_apellido2', '$this->alumno_grado', '$this->alumno_arma_o_servicio', '$this->alumno_nacionalidad')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    // METODO PARA CONSULTAR

    public function buscar(...$columnas){
        $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $colums FROM Alumnos where alumno_situacion = 1 ";


        if($this->alumno_nombre1 != ''){
            $sql .= " AND alumno_nombre1 like '%$this->alumno_nombre1%' ";
        }
        if($this->alumno_apellido1 != ''){
            $sql .= " AND alumno_apellido1 like'%$this->alumno_apellido1%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    //MODIFICAR DATOS

    public function modificar(){
        $sql = "UPDATE Alumnos SET alumno_nombre1 = '$this->alumno_nombre1', alumno_nombre2 = '$this->alumno_nombre2', alumno_apellido1 = '$this->alumno_apellido1', alumno_apellido2 = '$this->alumno_apellido2', alumno_grado = '$this->alumno_grado', alumno_arma_o_servicio = '$this->alumno_arma_o_servicio', alumno_nacionalidad = '$this->alumno_nacionalidad' WHERE alumno_id = $this->alumno_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
    //BUSCAR EL ID PARA PODER MODIFICAR LOS DATOS
    public function buscarId($id){
        $sql = " SELECT * FROM alumnos WHERE alumno_situacion = 1 AND alumno_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;
        return $resultado;
    }

    public function eliminar(){
        // $sql = "DELETE FROM productos WHERE prod_id = $this->prod_id ";

        // echo $sql;
        $sql = "UPDATE alumnos SET alumno_situacion = 0 WHERE alumno_id = $this->alumno_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function mostrarAlumnos(){
        $sql ="SELECT * FROM Alumnos where alumno_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function imprimir_nota($alumno_id){
        $sql ="SELECT DISTINCT alumno_nombre1, alumno_nombre2, alumno_apellido1, alumno_apellido2, alumno_grado, alumno_arma_o_servicio,
        alumno_nacionalidad, materia_nombre, nota  
        from notas inner join alumnos on alumno_id = nota_alumno_id
        inner join materias on nota_materia_id = materia_id where alumno_id = $alumno_id";
        $resultado = self::servir($sql);
        
        return $resultado;
    }

}