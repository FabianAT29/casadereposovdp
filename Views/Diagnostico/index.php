<?php
include "Views/Templates/header.php";

?>


<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active fs-3">Módulo Diagnóstico</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmDiagnostico();">Nuevo <i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblDiagnostico">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>DNI Paciente</th>
            <th>Medicamento</th>
            <th>Detalles</th>   
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<div id="nuevo_diagnostico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Diagnóstico</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmDiagnostico">
                    <div class="form-group inputUsu mt-3 focus">
                        <label for="dnipac">DNI Paciente</label>
                        <select id="dnipac" class="form-control" name="dnipac">
                            <?php foreach ($data['dnipac'] as $row) { ?>
                                <option value="<?php echo $row['dni']; ?>"><?php echo $row['nombre']; ?> <?php echo $row['apepaterno']; ?> <?php echo $row['apematerno']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="medicamento">Medicamento</label>
                        <input id="medicamento" class="form-control" type="text" name="medicamento" placeholder="Medicamento">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="detalles">Detalles</label>
                            <textarea id="detalles" class="form-control" name="detalles" placeholder="Detalles" rows="3"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarDia(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "Views/Templates/footer.php";
?>