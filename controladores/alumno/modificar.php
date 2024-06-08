<?php
    //  ini_set('display_errors', '1');
    //  ini_set('display_startup_errors', '1');
    //  error_reporting(E_ALL);

require '../../modelos/Alumnos.php';

// VALIDAR INFORMACION
$_POST['alumno_id'] = filter_var($_POST['alumno_id'], FILTER_VALIDATE_INT);
$_POST['alumno_nombre1'] = htmlspecialchars($_POST['alumno_nombre1']);
$_POST['alumno_nombre2'] = htmlspecialchars($_POST['alumno_nombre2']);
$_POST['alumno_apellido1'] = htmlspecialchars($_POST['alumno_apellido1']);
$_POST['alumno_apellido2'] = htmlspecialchars($_POST['alumno_apellido2']);
$_POST['alumno_grado'] = htmlspecialchars($_POST['alumno_grado']);
$_POST['alumno_arma_o_servicio'] = htmlspecialchars($_POST['alumno_arma_o_servicio']);
$_POST['alumno_nacionalidad'] = htmlspecialchars($_POST['alumno_nacionalidad']);


if ($_POST['alumno_nombre1'] == '' || $_POST['alumno_nombre2'] == '' || $_POST['alumno_apellido1'] == '' || $_POST['alumno_apellido2'] == '' || $_POST['alumno_grado'] == '' || $_POST['alumno_arma_o_servicio'] == '' || $_POST['alumno_nacionalidad'] == '' ) {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $alumno = new Alumnos($_POST);

        
        $modificar = $alumno->modificar();

        $resultado = [
            'mensaje' => 'CLIENTE MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
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
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/cliente/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>