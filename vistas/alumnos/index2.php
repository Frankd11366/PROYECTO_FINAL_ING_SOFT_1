<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE ALUMNOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/alumno/guardar.php" method="POST" class="border bg-light shadow rounded p-2">
        <div class="row">
            <div class="col-4">
                <label for="alumno_nombre1">PRIMER NOMBRE</label>
                <input type="text" name="alumno_nombre1" id="alumno_nombre1" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="alumno_nombre2">SEGUNDO NOMBRE</label>
                <input type="text" name="alumno_nombre2" id="alumno_nombre2" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="alumno_apellido1">PRIMER APELLIDO</label>
                <input type="text" name="alumno_apellido1" id="alumno_apellido1" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="alumno_apellido2">SEGUNDO APELLIDO</label>
                <input type="text" name="alumno_apellido2" id="alumno_apellido2" class="form-control" required>
            </div>
            <div class="col">
                <label for="alumno_grado">GRADO</label>
                <input type="text" name="alumno_grado" id="alumno_grado" class="form-control" required>
            </div>
            <div class="col">
                <label for="alumno_arma_o_servicio">ARMA O SERVICIO</label>
                <input type="text" name="alumno_arma_o_servicio" id="alumno_arma_o_servicio" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <label for="alumno_nacionalidad">NACIONALIDAD</label>
                <input type="text" name="alumno_nacionalidad" id="alumno_nacionalidad" class="form-control" required>
            </div>
            <div class="col"></div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
            <div class="col">
                <a href="../../controladores/cliente/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>