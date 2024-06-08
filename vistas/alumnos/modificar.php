<?php

require '../../modelos/Alumnos.php';

$_GET['alumno_id'] = filter_var(base64_decode($_GET['alumno_id']), FILTER_SANITIZE_NUMBER_INT);
$alumno = new Alumnos();

$AlumnoRegistrado = $alumno->buscarId($_GET['alumno_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR CLIENTE</h1>
<div class="row justify-content-center">
    <form action="../../controladores/alumno/modificar.php" method="POST" class="border bg-light shadow rounded p-2">
        <div class="row mb-3">
            <div class="col-12">
                <input type="hidden" name="alumno_id" id="alumno_id" class="form-control" required value="<?= $AlumnoRegistrado['alumno_id'] ?>">
            </div>
            <div class="col-4">
                <label for="alumno_nombre1">PRIMER NOMBRE</label>
                <input type="text" name="alumno_nombre1" id="alumno_nombre1" class="form-control" required value="<?= $AlumnoRegistrado['alumno_nombre1'] ?>">
            </div>
            <div class="col-4">
                <label for="alumno_nombre2">SEGUNDO NOMBRE</label>
                <input type="text" name="alumno_nombre2" id="alumno_nombre2" class="form-control" required value="<?= $AlumnoRegistrado['alumno_nombre2'] ?>">
            </div>
            <div class="col-4">
                <label for="alumno_apellido1">PRIMER APELLIDO</label>
                <input type="text" name="alumno_apellido1" id="alumno_apellido1" class="form-control" required value="<?= $AlumnoRegistrado['alumno_apellido1'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="alumno_apellido2">SEGUNDO APELLIDO</label>
                <input type="text" name="alumno_apellido2" id="alumno_apellido2" class="form-control" required value="<?= $AlumnoRegistrado['alumno_apellido2'] ?>">
            </div>
            <div class="col-4">
                <label for="alumno_grado">GRADO</label>
                <input type="text" name="alumno_grado" id="alumno_grado" class="form-control" required value="<?= $AlumnoRegistrado['alumno_grado'] ?>">
            </div>
            <div class="col-4">
                <label for="alumno_arma_o_servicio">ARMA O SERVICIO</label>
                <input type="text" name="alumno_arma_o_servicio" id="alumno_arma_o_servicio" class="form-control" required value="<?= $AlumnoRegistrado['alumno_arma_o_servicio'] ?>">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="alumno_nacionalidad">NACIONALIDAD</label>
                    <input type="text" name="alumno_nacionalidad" id="alumno_nacionalidad" class="form-control" required value="<?= $AlumnoRegistrado['alumno_nacionalidad'] ?>">
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
                <a href="../../controladores/cliente/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>