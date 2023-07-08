<?php
class Visitas extends Controller
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
        $data = $this->model->getVisita();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>
                    ';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarVis(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarVis(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>
                    ';
                $data[$i]['acciones'] = '
                <button class="btn btn-success" type="button" onclick="btnReingresarVis(' . $data[$i]['id'] . ');">Reingresar</button>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $dni = $_POST['dni'];
        $fecha = $_POST['fecha'];
        $turno = $_POST['turno'];
        $horario = $_POST['horario'];
        $id = $_POST['id'];
        if (empty($dni) || empty($fecha) || empty($turno) || empty($horario)) {
            $msg = "Todos los datos son obligatorios";
        } else {
            if ($id == "") {
                $data = $this->model->registrarVisita($dni, $fecha, $turno, $horario);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al registrar la visita";
                }
            } else {
                $data = $this->model->modificarVisita($dni, $fecha, $turno, $horario, $id);
                if ($data == "modificado") {
                    $msg = "modificado";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al modificar visita";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarVis($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionVis(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar la visita";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accionVis(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar la visita";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
