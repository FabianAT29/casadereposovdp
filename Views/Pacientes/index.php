<?php
include "Views/Templates/header.php";

?>


<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active fs-3">Módulo Pacientes</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmPaciente();">Nuevo <i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblPacientes">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Tipo de Estadia</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="nuevo_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Paciente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmPaciente">
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
                        <label for="apepaterno">Apellido Paterno</label>
                        <input id="apepaterno" class="form-control" type="text" name="apepaterno" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group">
                        <label for="apematerno">Apellido Materno</label>
                        <input id="apematerno" class="form-control" type="text" name="apematerno" placeholder="Apellido Materno">
                    </div>
                    <div class="form-group">
                        <label for="fechanac">Fecha de Nacimiento</label>
                        <input id="fechanac" class="form-control" type="date" name="fechanac" placeholder="Apellido Materno" onchange="calcularEdad()">
                    </div>

                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input id="edad" class="form-control" type="text" name="edad" placeholder="Edad" readonly>
                    </div>
                    <!-- Validacion para mostrar la edad -->
                    <script>
                        function calcularEdad() {
                            var fechaNacimiento = document.getElementById("fechanac").value;
                            var hoy = new Date();
                            var fechaNac = new Date(fechaNacimiento);
                            var edad = hoy.getFullYear() - fechaNac.getFullYear();
                            var mes = hoy.getMonth() - fechaNac.getMonth();

                            if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
                                edad--;
                            }

                            document.getElementById("edad").value = edad;
                        }
                    </script>
                    <div class="form-group inputUsu mt-3 focus">
                        <label for="id_estadia">Tipo de Estadia</label>
                        <select id="id_estadia" class="form-control" name="id_estadia">
                        <?php foreach ($data['estadia'] as $row) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarPac(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "Views/Templates/footer.php";
?>