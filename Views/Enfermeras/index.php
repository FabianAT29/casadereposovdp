<?php
include "Views/Templates/header.php";
?>


<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active fs-3">Módulo Enfermeras</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmEnfermera();">Nuevo <i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblEnfermeras">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>DNI Paciente</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<div id="nuevo_enfermera" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Enfermera</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmEnfermera">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="hidden" id="dni" name="dni">
                        <input id="dni" maxlength="8" pattern="[0-9]{8,8}" class="form-control" type="text" name="dni" placeholder="DNI">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apepaterno">Apellido Paterno</label>
                        <input id="apepaterno" class="form-control" type="text" name="apepaterno" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group">
                        <label for="apematerno">Apellido Materno</label>
                        <input id="apematerno" class="form-control" type="text" name="apematerno" placeholder="Apellido Materno">
                    </div>
                    <div class="form-group inputUsu mt-3 focus">
                        <label for="dnipac">DNI Paciente</label>
                        <select id="dnipac" class="form-control" name="dnipac">
                        <?php foreach ($data['dnipac'] as $row) { ?>
                            <option value="<?php echo $row['dni']; ?>"><?php echo $row['nombre']; ?> <?php echo $row['apepaterno']; ?> <?php echo $row['apematerno']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarEnf(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "Views/Templates/footer.php";
?>