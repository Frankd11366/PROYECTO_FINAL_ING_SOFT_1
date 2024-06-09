<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/Alumnos.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['alumno_nombre1'] = htmlspecialchars($_GET['alumno_nombre1']);
        $_GET['alumno_apellido1'] = htmlspecialchars($_GET['alumno_apellido2']);
    
        $objAlumno = new Alumnos($_GET);
        $alumnos = $objAlumno->buscar();
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


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/notas/index.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Alumnos</h1>
    <div class="row justify-content-center">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>id.</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($alumnos) > 0) : ?>
                        <?php foreach ($alumnos as $key => $alumno) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $alumno['alumno_id'] ?></td>
                                <td><?= $alumno['alumno_nombre1'] ?></td>
                                <td><?= $alumno['alumno_nombre2'] ?></td>
                                <td><?= $alumno['alumno_apellido1'] ?></td>
                                <td><?= $alumno['alumno_apellido2'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../vistas/notas/asignarnota.php?alumno_id=<?= base64_encode($alumno['alumno_id'])?>"><i class="bi bi-pencil-square me-2"></i>Asignar Notas</a></li>
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
<?php include_once '../../vistas/templates/footer.php'; ?>  