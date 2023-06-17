<?php
class Familiares extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location:" . base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $data['dnipac'] = $this->model->getDniPaciente();
        $this->views->getView($this, "index", $data);
    }

    
    public function listar()
    {
        $data = $this->model->getFamiliares();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>
                    ';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarFam(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarFam(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>
                    ';
                $data[$i]['acciones'] = '
                <button class="btn btn-success" type="button" onclick="btnReingresarFam(' . $data[$i]['id'] . ');">Reingresar</button>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apepaterno = $_POST['apepaterno'];
        $apematerno = $_POST['apematerno'];
        $correoelec = $_POST['correoelec'];
        $telefono = $_POST['telefono'];
        $dnipac = $_POST['dnipac'];
        $id = $_POST['id'];
        if (empty($dni) || empty($nombre) || empty($apepaterno) || empty($apematerno) || empty($correoelec) || empty($telefono) || empty($dnipac)) {
            $msg = "Todos los datos son obligatorios";
        } else {
            if ($id == "") {
                $data = $this->model->registrarFamiliar($dni, $nombre, $apepaterno, $apematerno, $correoelec, $telefono, $dnipac);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al registrar el familiar";
                }
            } else {
                $data = $this->model->modificarFamiliar($dni, $nombre, $apepaterno, $apematerno, $correoelec, $telefono, $dnipac, $id);
                if ($data == "modificado") {
                    $msg = "modificado";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al modificar al familiar";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarFam($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionFam(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el familiar";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accionFam(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el familiar";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
