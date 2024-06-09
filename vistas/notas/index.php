<?php
require_once '../../modelos/Alumnos.php';
require_once '../../modelos/Materias.php';
?>

<?php

try {
    $alumno = new Alumnos();
    $materia = new Materias();
    $alumnos = $alumno->buscar();
    $materias = $materia->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>


<?php include_once '../../vistas/templates/header.php'?>

<div class="container mt-5">
    <h1 class="text-center">Formulario de ingreso de calificaciones</h1>
    <div class="row justify-content-center">
        <form action="../../controladores/notas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="not_alumno">Alumno</label>
                    <select name="not_alumno" id="not_alumno" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($alumnos as $key => $alumno) : ?>
                            <option value="<?= $alumno['alum_id'] ?>"><?= $alumno['alum_nombre'] . ' ' . $alumno['alum_apellido'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <hr>
            <h2>Detalle de materias</h2>
            <div class="row mb-3">
                <div class="col-lg-8">
                    <label for="materias">Materia</label>
                    <select name="not_materia" id="materias" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($materias as $key => $materia) : ?>
                            <option value="<?= $materia['mat_id'] ?>"><?= $materia['mat_nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="notas">Punteo</label>
                    <input type="number" step="any" name="not_puntos" id="notas" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary w-100">Guardar</button>
                </div>
            </div>
        </form>
         
    </div>
</div>
<?php include_once '../../vistas/templates/footer.php'?>