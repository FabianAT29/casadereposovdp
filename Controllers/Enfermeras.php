<?php
class Enfermeras extends Controller
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
        $data = $this->model->getEnfermeras();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>
                    ';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarEnf(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarEnf(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>
                    ';
                $data[$i]['acciones'] = '
                <button class="btn btn-success" type="button" onclick="btnReingresarEnf(' . $data[$i]['id'] . ');">Reingresar</button>';
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
        $dnipac = $_POST['dnipac'];
        $id = $_POST['id'];
        if (empty($dni) || empty($nombre) || empty($apepaterno) || empty($apematerno) || empty($dnipac)) {
            $msg = "Todos los datos son obligatorios";
        } else {
            if ($id == "") {
                $data = $this->model->registrarEnfermeras($dni, $nombre, $apepaterno, $apematerno, $dnipac);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al registrar a la enfermera";
                }
            } else {
                $data = $this->model->modificarEnfermeras($dni, $nombre, $apepaterno, $apematerno, $dnipac, $id);
                if ($data == "modificado") {
                    $msg = "modificado";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al modificar a la enfermera";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarEnf($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionEnf(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar la enfermera";
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
            $msg = "Error al reingresar la enfermera";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
