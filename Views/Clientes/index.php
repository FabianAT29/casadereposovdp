<?php
include "Views/Templates/header.php";
?>


<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active fs-3">Clientes</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmCliente();">Nuevo  <i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblClientes">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Direcion</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmCliente">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="hidden" id="id" name="id">
                        <input id="dni" maxlength="8" pattern="[0-9]{8,8}" class="form-control" type="text" name="dni" placeholder="DNI">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarCli(event);"id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "Views/Templates/footer.php";
?>