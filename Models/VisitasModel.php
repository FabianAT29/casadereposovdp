<?php
class VisitasModel extends Query
{
    private  $dni, $fecha, $turno, $horario, $id, $estado;
    public function __construct()
    {
        parent::__construct();
    }
    public function getDniPaciente()
    {
        $sql =  "SELECT * FROM pacientes";
        $data = $this->selectAll($sql);
        return $data;
    }

    //metodo para listar todos
    public function getVisita()
    {
        $sql =  "SELECT * FROM visitas";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarVisita(
        string $dni,
        string $fecha,
        string $turno,
        string $horario
    ) {
        $this->dni = $dni;
        $this->fecha = $fecha;
        $this->turno = $turno;
        $this->horario = $horario;
        $verificar = "SELECT * from visitas WHERE dni ='$this->dni'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO visitas(dni, fecha, turno, horario) VALUES(?,?,?,?)";
            $datos = array($this->dni, $this->fecha, $this->turno, $this->horario);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }
        return $res;
    }

    public function modificarVisita(
        string $dni,
        string $fecha,
        string $turno,
        string $horario,
        int $id
    ) {
        $this->dni = $dni;
        $this->fecha = $fecha;
        $this->turno = $turno;
        $this->horario = $horario;
        $this->id = $id;
        $sql = "UPDATE visitas SET dni = ?, fecha=?, turno = ?, horario = ? WHERE id= ?";
        $datos = array($this->dni, $this->fecha, $this->turno, $this->horario, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarVis(int $id)
    {
        $sql = "SELECT * FROM visitas WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    /*public function eliminarUser(int $id){
            $this->id = $id;
            $sql = "UPDATE dni SET estado = 0 WHERE id = ?";
            $datos = array($this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }*/
    public function accionVis(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE visitas SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
