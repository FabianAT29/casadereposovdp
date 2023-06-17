<?php
class PacientesModel extends Query
{
    private  $dni, $nombre, $apepaterno, $apematerno, $fechanac, $edad, $id_estadia, $id, $estado;
    public function __construct()
    {
        parent::__construct();
    }
    public function getEstadias()
    {

        $sql =  "SELECT * FROM tipoestadia";
        $data = $this->selectAll($sql);
        return $data;
    }
    //metodo para listar todos
    public function getPacientes()
    {

        $sql =  "SELECT pacientes.*, tipoestadia.nombre AS nombreestadia FROM pacientes 
        INNER JOIN tipoestadia ON pacientes.id_estadia = tipoestadia.id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarPaciente(
        string $dni,
        string $nombre,
        string $apepaterno,
        string $apematerno,
        $fechanac,
        int $edad,
        string $id_estadia
    ) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apepaterno = $apepaterno;
        $this->apematerno = $apematerno;
        $this->fechanac = $fechanac;
        $this->edad = $edad;
        $this->id_estadia = $id_estadia;
        $verificar = "SELECT * FROM pacientes WHERE dni ='$this->dni'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO pacientes(dni, nombre, apepaterno, apematerno, fechanac, edad, id_estadia) VALUES(?,?,?,?,?,?,?)";
            $datos = array($this->dni, $this->nombre, $this->apepaterno, $this->apematerno, $this->fechanac, $this->edad, $this->id_estadia);
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

    public function modificarPaciente(
        string $dni,
        string $nombre,
        string $apepaterno,
        string $apematerno,
        string $fechanac,
        int $edad,
        string $id_estadia,
        int $id
    ) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apepaterno = $apepaterno;
        $this->apematerno = $apematerno;
        $this->fechanac = $fechanac;
        $this->edad = $edad;
        $this->id_estadia = $id_estadia;
        $this->id = $id;
        $sql = "UPDATE pacientes SET dni = ?, nombre=?, apepaterno = ?, apematerno = ?, fechanac =?, edad = ?, id_estadia = ? WHERE id= ?";
        $datos = array($this->dni, $this->nombre, $this->apepaterno, $this->apematerno, $this->fechanac, $this->edad, $this->id_estadia, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarPac(int $id)
    {
        $sql = "SELECT * FROM pacientes WHERE id = $id";
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
    public function accionPac(int $estado, int $id)
    {
        $this->id = $id;
        $this->nombre = $estado;
        $sql = "UPDATE pacientes SET estado = ? WHERE id = ?";
        $datos = array($this->nombre, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
