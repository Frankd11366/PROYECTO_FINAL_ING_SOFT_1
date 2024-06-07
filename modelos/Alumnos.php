<?php
require 'Conexion.php';

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
        $this->alumno_situacion = $args['alumno_situacion'] ?? '';

    }
        // INSERTAR
      public function guardar(){
        $sql = "INSERT into cliente (alumno_nombre1, alumno_nombre2, alumno_apellido1, 
        alumno_apellido2, alumno_grado, alumno_arma_o_servicio, alumno_nacionalidad) values ('$this->alumno_nombre1',
        '$this->alumno_nombre2', '$this->alumno_apellido1', '$this->alumno_apellido2' 
        '$this->alumno_grado', '$this->alumno_arma_o_servicio', '$this->alumno_nacionalidad',)";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

}

