<?php
require_once 'Conexion.php';

class Materias extends Conexion{
    public $materia_id;
    public $materia_nombre;
    public $materia_situacion;

    public function __construct($args = [])
    {
        $this->materia_id = $args['materia_id'] ?? null;
        $this->materia_nombre = $args['materia_nombre'] ?? '';
        $this->materia_situacion = $args['materia_situacion'] ?? null;

    }
        // INSERTAR
      public function guardar(){
        $sql = "INSERT into materias (materia_nombre) values ('$this->materia_nombre')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    // METODO PARA CONSULTAR

    public function buscar(...$columnas){
        $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $colums FROM Materias where materia_situacion = 1 ";


        if($this->materia_nombre != ''){
            $sql .= " AND materia_nombre like '%$this->materia_nombre%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function mostrarMaterias(){
        $sql ="SELECT * FROM Materias where materia_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;
    }

    //MODIFICAR DATOS

    public function modificar(){
        $sql = "UPDATE Materias SET materia_nombre = '$this->materia_nombre' WHERE materia_id = $this->materia_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    
    //BUSCAR EL ID PARA PODER MODIFICAR LOS DATOS
    public function buscarId($id){
        $sql = " SELECT * FROM Materias WHERE materia_situacion = 1 AND materia_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;
        return $resultado;
    }

    public function eliminar(){
        // $sql = "DELETE FROM productos WHERE prod_id = $this->prod_id ";

        // echo $sql;
        $sql = "UPDATE Materias SET materia_situacion = 0 WHERE materia_id = $this->materia_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}