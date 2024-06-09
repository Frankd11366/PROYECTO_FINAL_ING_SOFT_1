<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE REGISTRO DE MATERIAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/materias/guardar.php" method="POST" class="border bg-light shadow rounded p-2">
        <div class="row p-4">
        <div class="col-4 p-5"></div>
            <div class="col-4">
                <label for="materia_nombre">NOMBRE DE LA MATERIA</label>
                <input type="text" name="materia_nombre" id="materia_nombre" class="form-control" required>
            </div>
        </div>
        <div class="col-4 p-3"></div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
            <div class="col">
                <a href="../../vistas/materias/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>