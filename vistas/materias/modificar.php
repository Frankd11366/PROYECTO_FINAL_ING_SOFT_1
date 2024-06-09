<?php

require '../../modelos/Materias.php';

$_GET['materia_id'] = filter_var(base64_decode($_GET['materia_id']), FILTER_SANITIZE_NUMBER_INT);
$materia = new Materias();

$MateriaRegistrada = $materia->buscarId($_GET['materia_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR DATOS DE MATERIA</h1>
<div class="row justify-content-center">
    <form action="../../controladores/materias/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col-12">
                <input type="hidden" name="materia_id" id="materia_id" class="form-control" required value="<?= $MateriaRegistrada['materia_id'] ?>">
            </div>
            <div class="col">
                <label for="materia_nombre">NOMBRE MATERIA</label>
                <input type="text" name="materia_nombre" id="materia_nombre" class="form-control" required value="<?= $MateriaRegistrada['materia_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/materias/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>