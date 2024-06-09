<?php

require '../../modelos/Notas.php';

// VALIDAR INFORMACION
$_POST['nota_alumno_id'] = htmlspecialchars($_POST['nota_alumno_id']);
$_POST['nota_materia_id'] = htmlspecialchars($_POST['nota_materia_id']);
$_POST['nota'] = htmlspecialchars($_POST['nota']);




echo "<pre>";
print_r($_POST);
echo "</pre>";


if ($_POST['nota_alumno_id'] == '' ||  $_POST['nota_materia_id'] == '' ||  $_POST['nota'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $nota = new Notas($_POST);
        $guardar = $nota->guardar();
        $resultado = [
            'mensaje' => 'NOTA INSERTADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/notas/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>