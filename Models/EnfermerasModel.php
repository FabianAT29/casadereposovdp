<?php
class EnfermerasModel extends Query
{
    private  $dni, $nombre, $apepaterno, $apematerno, $dnipac, $id ,$estado;
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
    public function getEnfermeras()
    {
        $sql =  "SELECT * FROM enfermeras";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarEnfermeras(
        string $dni,
        string $nombre,
        string $apepaterno,
        string $apematerno,
        string $dnipac
    ) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apepaterno = $apepaterno;
        $this->apematerno = $apematerno;
        $this->dnipac = $dnipac;
        $verificar = "SELECT * FROM enfermeras WHERE dni ='$this->dni'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO enfermeras(dni, nombre, apepaterno, apematerno, dnipac) VALUES(?,?,?,?,?)";
            $datos = array($this->dni, $this->nombre, $this->apepaterno, $this->apematerno,$this->dnipac);
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

    public function modificarEnfermeras(
        string $dni,
        string $nombre,
        string $apepaterno,
        string $apematerno,
        string $dnipac,
        int $id
    ) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apepaterno = $apepaterno;
        $this->apematerno = $apematerno;
        $this->dnipac = $dnipac;
        $this->id = $id;
        $sql = "UPDATE enfermeras SET dni = ?, nombre=?, apepaterno = ?, apematerno = ?, dnipac = ? WHERE id= ?";
        $datos = array($this->dni, $this->nombre, $this->apepaterno, $this->apematerno, $this->dnipac, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarEnf(int $id)
    {
        $sql = "SELECT * FROM enfermeras WHERE id = $id";
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
    public function accionEnf(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE enfermeras SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
