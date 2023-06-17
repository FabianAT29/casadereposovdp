<?php
include "Views/Templates/header.php";
?>


<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active fs-3">Módulo Familiares</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmFamiliar();">Nuevo <i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblFamiliares">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo Electronico</th>
            <th>Telefono</th>
            <th>DNI Paciente</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<div id="nuevo_familiar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Familiar</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmFamiliar">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="hidden" id="id" name="id">
                        <input id="dni" maxlength="8" pattern="[0-9]{8,8}" class="form-control" type="text" name="dni" placeholder="DNI">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apepaterno">Apellido Paterno</label>
                        <input id="apepaterno" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" type="text" name="apepaterno" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group">
                        <label for="apematerno">Apellido Materno</label>
                        <input id="apematerno" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" type="text" name="apematerno" placeholder="Apellido Materno">
                    </div>
                    <div class="form-group">
                        <label for="correoelec">Correo Electrónico</label>
                        <input id="correoelec" class="form-control" type="email" name="correoelec" placeholder="Correo Electronico">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono" pattern="[0-9]{9,9}" maxlength="9">
                    </div>
                    <!--<div class="form-group">
                        <label for="dnipac">DNI Paciente</label>
                        <input id="dnipac" class="form-control" type="text" name="dnipac" placeholder="Dni del paciente" pattern="[0-9]{8,8}" maxlength="8">
                    </div>--->
                    <div class="form-group inputUsu mt-3 focus">
                        <label for="dnipac">DNI Paciente</label>
                        <select id="dnipac" class="form-control" name="dnipac">
                        <?php foreach ($data['dnipac'] as $row) { ?>
                            <option value="<?php echo $row['dni']; ?>"><?php echo $row['nombre']; ?> <?php echo $row['apepaterno']; ?> <?php echo $row['apematerno']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarFam(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "Views/Templates/footer.php";
?>