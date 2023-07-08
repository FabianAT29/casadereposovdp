<?php
class Diagnostico extends Controller
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
        $data = $this->model->getDiagnostico();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>
                    ';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarDia(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarDia(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>
                    ';
                $data[$i]['acciones'] = '
                <button class="btn btn-success" type="button" onclick="btnReingresarDia(' . $data[$i]['id'] . ');">Reingresar</button>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $dnipac = $_POST['dnipac'];
        $medicamento = $_POST['medicamento'];
        $detalles = $_POST['detalles'];
        $id = $_POST['id'];
        if (empty($dnipac) || empty($medicamento) || empty($detalles) ) {
            $msg = "Todos los datos son obligatorios";
        } else {
            if ($id == "") {
                $data = $this->model->registrarDiagnostico($dnipac, $medicamento, $detalles);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al registrar diagnostico";
                }
            } else {
                $data = $this->model->modificarDiagnostico($dnipac, $medicamento, $detalles, $id);
                if ($data == "modificado") {
                    $msg = "modificado";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al modificar diagnostico";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarDia($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionDia(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar diagnostico";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accionDia(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar diagnostico";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
