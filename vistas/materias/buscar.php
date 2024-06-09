<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">BUSCAR MATERIAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/materias/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="materia_nombre">NOMBRE DE MATERIA</label>
                <input type="text" name="materia_nombre" id="materia_nombre" class="form-control" >
            </div>
        </div>        
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white"> BUSCAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>

   