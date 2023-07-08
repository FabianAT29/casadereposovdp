<?php
class Pacientes extends Controller
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
        $data['estadia'] = $this->model->getEstadias();
        $this->views->getView($this, "index", $data);
    }



    public function listar()
    {
        $data = $this->model->getPacientes();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>
                    ';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarPaci(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarPaci(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>
                    ';
                $data[$i]['acciones'] = '
                <button class="btn btn-success" type="button" onclick="btnReingresarPaci(' . $data[$i]['id'] . ');">Reingresar</button>';
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
        $fechanac = $_POST['fechanac'];
        $edad = $_POST['edad'];
        $id_estadia = $_POST['id_estadia'];
        $id = $_POST['id'];
        if (empty($dni) || empty($nombre) || empty($apepaterno) || empty($apematerno) || empty($fechanac) || empty($edad) || empty($id_estadia)) {
            $msg = "Todos los datos son obligatorios";
        } else {
            if ($id == "") {
                $data = $this->model->registrarPaciente($dni, $nombre, $apepaterno, $apematerno, $fechanac, $edad, $id_estadia);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al registrar el paciente";
                }
            } else {
                $data = $this->model->modificarPaciente($dni, $nombre, $apepaterno, $apematerno, $fechanac, $edad, $id_estadia, $id);
                if ($data == "modificado") {
                    $msg = "modificado";
                } else if ($data == "existe") {
                    $msg = "El dni ya existe";
                } else {
                    $msg = "Error al modificar el paciente";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarPac($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionPac(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el paciente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accionPac(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el paciente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

}
