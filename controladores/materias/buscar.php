<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Materias.php';

// consulta
try {
    // var_dump($_GET);
    $_GET['materia_nombre'] = htmlspecialchars($_GET['materia_nombre']);

    $objMaterias = new Materias($_GET);
    $materias = $objMaterias->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $materias,
        'codigo' => 1
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row mb-4 justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<h1 class="text-center">Listado de Materias</h1>
<div class="row justify-content-center">
    <div class="col">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No. Id</th>
                    <th>Materia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($materias) > 0) : ?>
                    <?php foreach ($materias as $key => $materia) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $materia['materia_nombre'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/materias/modificar.php?materia_id=<?= base64_encode($materia['materia_id']) ?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/materias/eliminar.php?materia_id=<?= base64_encode($materia['materia_id']) ?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No hay clientes registrados</td>
                    </tr>
                <?php endif ?>
            </tbody>

        </table>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/alumnos/index.php" class="btn btn-primary w-100">Volver a Inicio</a>
    </div>
</div>
<?php include_once '../../vistas/templates/footer.php'; ?>