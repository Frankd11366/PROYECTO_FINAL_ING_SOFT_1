<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require '../../modelos/Alumnos.php';
require '../../modelos/Materias.php';


$_GET['alumno_id'] = filter_var(base64_decode($_GET['alumno_id']), FILTER_SANITIZE_NUMBER_INT);
$_GET['materia_id'] = filter_var(base64_decode($_GET['materia_id']), FILTER_SANITIZE_NUMBER_INT);


$buscarId = new Alumnos;
$AlumnoSeleccionado = $buscarId->buscarId($_GET['alumno_id']);

$buscarId1 = new Materias;
$MateriaSeleccionada = $buscarId1->buscarId($_GET['materia_id']);

// $verMaterias = new Materias();
// $materias = $verMaterias->mostrarMaterias();



include_once '../../vistas/templates/header.php';

?>

<h1 class="text-center">LIBRETA DE CALIFICACIONES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/notas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-7">
        <div class="row mb-3">
            <div class="col-12">
                <input type="text" name="nota_alumno_id" id="nota_alumno_id" class="form-control" required value="<?= $AlumnoSeleccionado['alumno_id'] ?>">
            </div>
            <div class="col-12">
                <input type="text" name="nota_materia_id" id="nota_materia_id" class="form-control" required value="<?= $MateriaSeleccionada['materia_id'] ?>">
            </div>
            <div class="col-12">
                <label for="nombre">ALUMNO SELECCIONADO</label>
                <input type="text" name="alumno_nombre" id="alumno_id" class="form-control" required value="<?= $AlumnoSeleccionado['alumno_nombre1'] . " " . $AlumnoSeleccionado['alumno_nombre2'] ?>" readonly>
            </div>
            <div class="col-12">
                <label for="nombre">MATERIA SELECCIONADA</label>
                <input type="text" name="materia_nombre" id="materia_id" class="form-control" required value="<?= $MateriaSeleccionada['materia_nombre'] ?>" readonly>
            </div>
            
        </div>
      
            <div class="col-6">
                <label for="nota">NOTA</label>
                <input type="number" name="nota" id="nota" class="form-control" required>
            </div>       
        </div>
        <div class="row mb-3 p-5">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Guardar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/notas/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>