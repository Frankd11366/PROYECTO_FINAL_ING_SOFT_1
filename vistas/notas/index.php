<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">ASIGNAR NOTAS A ALUMNOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/notas/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <!-- <div class="row mb-3">
            <div class="col">
                <label for="alumno_nombre1">NOMBRE</label>
                <input type="text" name="alumno_nombre1" id="alumno_nombre1" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="alumno_apellido1">APELLIDO</label>
                <input type="text" name="alumno_apellido1" id="alumno_apellido1" class="form-control" >
            </div>
        </div> -->
        
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-secondary text-white"> BUSCAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>

   