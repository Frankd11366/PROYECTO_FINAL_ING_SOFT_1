<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require '../../modelos/Alumnos.php';
require '../../modelos/Materias.php';
require '../../modelos/Notas.php';
require '../../includes/funciones.php';


try {
    // var_dump($_GET);
    $_GET['alumno_id'] = filter_var(base64_decode($_GET['alumno_id']), FILTER_SANITIZE_NUMBER_INT);

    $objAlumno = new Alumnos;
    $alumnos = $objAlumno->imprimir_nota($_GET['alumno_id']);

    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $alumnos,
        'codigo' => 1
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}

// var_dump($alumnos);
// exit;

include_once '../../vistas/templates/header.php';

?>


<h1 class="text-center">LIBRETA DE CALIFICACIONES</h1>
<div class="row justify-content-center">
    <div class="col">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="7">INFORMACION PERSONAL DEL ALUMNO</th>
                </tr>
                <tr>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Grado</th>
                    <th>Arma o Servicio</th>

                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($alumnos) > 0) : ?>
                        <tr>
                            <td><?= $alumnos[0]['alumno_nombre1'] ?></td>
                            <td><?= $alumnos[0]['alumno_nombre2'] ?></td>
                            <td><?= $alumnos[0]['alumno_apellido1'] ?></td>
                            <td><?= $alumnos[0]['alumno_apellido2'] ?></td>
                            <td><?= $alumnos[0]['alumno_grado'] ?></td>
                            <td><?= $alumnos[0]['alumno_arma_o_servicio'] ?></td>
                        </tr>
                <?php else : ?>
                    <tr>
                        <th colspan="7">NO HAY ALUMNOS REGISTRADOS</th>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="4">NOTAS OBTENIDAS</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Materia</th>
                    <th>Punteo</th>
                    <th>Ganó / Perdió</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($alumnos) > 0) : ?>
                    <?php foreach ($alumnos as $key => $alumno) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $alumno['materia_nombre'] ?></td>
                            <td><?= $alumno['nota'] ?></td>
                            <td><?= $alumno['nota'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <th colspan="7">NO HAY ALUMNOS REGISTRADOS</th>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>