<?php
require_once 'Conexion.php';

class Calificaciones extends Conexion{
    public $alumno_id;
    public $alumno_nombre1;
    public $alumno_nombre2;
    public $alumno_apellido1;
    public $alumno_apellido2;
    public $alumno_grado;
    public $alumno_arma_o_servicio;
    public $alumno_nacionalidad;
    public $materia_id;
    public $materia_nombre;
    public $nota_id;
    public $nota;


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
        $this->materia_id = $args['materia_id'] ?? null;
        $this->materia_nombre = $args['materia_nombre'] ?? '';
        $this->nota_id = $args['nota_id'] ?? '';
        $this->nota = $args['nota'] ?? '';
    }

    public function buscar(...$columnas){
        $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $colums FROM Alumnos, Materias, Notas where alumno_situacion, materia_situacion, nota_situacion = 1 ";

        if($this->alumno_nombre1 != ''){
            $sql .= " AND alumno_nombre1 like '%$this->alumno_nombre1%' ";
        }
        if($this->materia_nombre != ''){
            $sql .= " AND materia_nombre like'%$this->materia_nombre%' ";
        }
        if($this->nota != ''){
            $sql .= " AND nota like'%$this->nota%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }
}
