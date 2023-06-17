<?php
include "Views/Templates/header.php";
?>


<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active fs-3">Módulo Visitas</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmVisita();">Nuevo <i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblVisitas">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Fecha</th>
            <th>Turno</th>
            <th>Horario</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<div id="nuevo_visita" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nueva Visita</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmVisita">
                    <div class="form-group inputUsu mt-3 focus">
                        <label for="dni">Nombre del Paciente</label>
                        <select id="dni" class="form-control" name="dni">
                            <?php foreach ($data['dnipac'] as $row) { ?>
                                <option value="<?php echo $row['dni']; ?>"><?php echo $row['nombre']; ?> <?php echo $row['apepaterno']; ?> <?php echo $row['apematerno']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" class="form-control" type="date" name="fecha" placeholder="Fecha">
                    </div>
                    <div class="form-group inputUsu mt-3 focus">
                        <label for="turno">Turno de atención</label>
                        <select id="turno" class="form-control" name="turno">
                            <option value="0"></option>
                            <option value="1">Mañana</option>
                            <option value="2">Tarde</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="horario">Horario de atención</label>
                        <select id="horario" class="form-control" name="horario">
                            <option value="0"></option>
                            <option value="1">10-11 a.m.</option>
                            <option value="2">11-12 a.m. </option>
                            <option value="3">1-2 p.m.</option>
                            <option value="4">2-3 p.m.</option>
                            <option value="5">3-4 p.m.</option>
                            <option value="6">4-5 p.m.</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarVis(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "Views/Templates/footer.php";
?>