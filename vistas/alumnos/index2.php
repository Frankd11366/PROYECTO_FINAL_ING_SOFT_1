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
                <br>
                <select name="alumno_grado" id="alumno  _grado">
                    <option>Seleccione su Grado</option>
                    <option value="Subteniente">Subteniente</option>
                    <option value="Teniente">Teniente</option>
                    <option value="Alferes de Fragata">Alferes de Fragata</option>
                    <option value="Alferes de Navio">Alferes de Navio</option>
                </select>
            </div>
            <div class="col">
                <label for="alumno_arma_o_servicio">ARMA O SERVICIO</label>
                <br>
                <select name="alumno_arma_o_servicio" id="alumno_arma_o_servicio">
                    <option>Seleccione su Arma o Servicio</option>
                    <option value="Infantería">Infantería</option>
                    <option value="Artillería">Artillería</option>
                    <option value="Caballería">Caballería</option>
                    <option value="Ingenieros">Ingenieros</option>
                    <option value="Aviación">Aviación</option>
                    <option value="Marina">Marina</option>
                    <option value="Transmisiones Militares">Transmisiones Militares</option>
                    <option value="Material de Guerra">Material de Guerra</option>
                    <option value="Policia Militar">Policia Militar</option>
                    <option value="Intendencia">Intendencia</option>
                    <option value="Sanidad MIlitar">Sanidad MIlitar</option>
                </select>
            </div>
        </div>
        <div class="row m-5">
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
                <a href="../../vistas/alumnos/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>