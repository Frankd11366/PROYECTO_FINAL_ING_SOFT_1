<?php

require '../../modelos/Alumnos.php';
require '../../modelos/Materias.php';

$_GET['alumno_id'] = filter_var(base64_decode($_GET['alumno_id']), FILTER_SANITIZE_NUMBER_INT);
$_GET['materia_id'] = filter_var(base64_decode($_GET['materia_id']), FILTER_SANITIZE_NUMBER_INT);

$alumno = new Alumnos();
$AlumnoRegistrado = $alumno->buscarId($_GET['alumno_id']);

$materia = new Materias();
$MateriaRegistrada = $materia->buscarId($_GET['materia_id']);

// var_dump($materia);
// exit;

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR NOTA DEL ALUMNO</h1>
<div class="row justify-content-center">
    <form action="../../controladores/alumno/modificar.php" method="POST" class="border bg-light shadow rounded p-2">
        <div class="row mb-3">
            <div class="col-12">
                <input type="hidden" name="alumno_id" id="alumno_id" class="form-control" required value="<?= $AlumnoRegistrado['alumno_id'] ?>">
            </div>
            <div class="col-12">
                <input type="hidden" name="materia_id" id="materia_id" class="form-control" required value="<?= $MateriaRegistrada['materia_id'] ?>">
            </div>
            <h1>ALUMNO SELECCIONADO</h1>
            <div class="col-4">
                <label for="alumno_nombre1">NOMBRE</label>
                <input type="text" name="alumno_nombre1" id="alumno_nombre1" class="form-control" required value="<?= $AlumnoRegistrado['alumno_nombre1'] ?>">
            </div>
            <div class="col-4">
                <label for="alumno_apellido1">APELLIDO</label>
                <input type="text" name="alumno_apellido1" id="alumno_apellido1" class="form-control" required value="<?= $AlumnoRegistrado['alumno_apellido1'] ?>">
            </div>
            <div class="col-4">
                <label for="materia_nombre">MATERIA</label>
                <input type="text" name="materia_nombre" id="materia_nombre" class="form-control" required value="<?= $MateriaRegistrada['materia_nombre'] ?>">
            </div>
        </div>
</div>
<div class="row mb-3">
    <div class="col">
        <button type="submit" class="btn btn-warning w-100">Modificar</button>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="../../controladores/alumno/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
    </div>
</div>
</form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>