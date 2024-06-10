<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require '../../modelos/Alumnos.php';
require '../../modelos/Materias.php';


$_GET['alumno_id'] = filter_var(base64_decode($_GET['alumno_id']), FILTER_SANITIZE_NUMBER_INT);

$buscarId = new Alumnos;
$AlumnoSeleccionado = $buscarId->buscarId($_GET['alumno_id']);

$verMaterias = new Materias();
$materias = $verMaterias->mostrarMaterias();



include_once '../../vistas/templates/header.php';

?>

<h1 class="text-center">ASIGNAR NOTA DEL ALUMNO</h1>
<div class="row justify-content-center">
    <form action="../../controladores/notas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-7">
        <div class="row mb-3">
            <div class="col-12">
                <input type="hidden" name="nota_alumno_id" id="nota_alumno_id" class="form-control" required value="<?= $AlumnoSeleccionado['alumno_id'] ?>">
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                <label for="nombre">ALUMNO SELECCIONADO</label>
                <input type="text" name="alumno_nombre" id="alumno_id" class="form-control" required value="<?= $AlumnoSeleccionado['alumno_nombre1'] . " " . $AlumnoSeleccionado['alumno_nombre2'] ?>" readonly>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row mb-3">
            <div class="col-6 mb-3">
                <label for="nota_materia_id">SELECCIONE MATERIA</label>
                <select id="nota_materia_id" name="nota_materia_id" class="form-control" required>
                    <option value="">SELECCIONE</option>
                    <?php foreach ($materias as $materia) : ?>
                        <option value="<?= $materia['materia_id'] ?>">
                            <?= $materia['materia_nombre'] . "" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-6">
                <label for="nota">ASIGNE NOTA </label>
                <input type="number" name="nota" id="nota" class="form-control" required>
            </div>       
        </div>
        <div class="row m-3 p-5">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">Guardar</button>
            </div>
            <div class="col">
                <a href="../../controladores/notas/buscar.php" class="btn btn-danger w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>