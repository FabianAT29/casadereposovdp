<?php
class FamiliaresModel extends Query
{
    private  $dni, $nombre, $apepaterno, $apematerno, $correoelec, $telefono, $dnipac, $id ,$estado;
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
    public function getFamiliares()
    {
        $sql =  "SELECT * FROM familiares";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarFamiliar(
        string $dni,
        string $nombre,
        string $apepaterno,
        string $apematerno,
        string $correoelec,
        string $telefono,
        string $dnipac
    ) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apepaterno = $apepaterno;
        $this->apematerno = $apematerno;
        $this->correoelec = $correoelec;
        $this->telefono = $telefono;
        $this->dnipac = $dnipac;
        $verificar = "SELECT * FROM familiares WHERE dni ='$this->dni'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO familiares(dni, nombre, apepaterno, apematerno, correoelec, telefono, dnipac) VALUES(?,?,?,?,?,?,?)";
            $datos = array($this->dni, $this->nombre, $this->apepaterno, $this->apematerno, $this->correoelec, $this->telefono,$this->dnipac);
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

    public function modificarFamiliar(
        string $dni,
        string $nombre,
        string $apepaterno,
        string $apematerno,
        string $correoelec,
        int $telefono,
        string $dnipac,
        int $id
    ) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apepaterno = $apepaterno;
        $this->apematerno = $apematerno;
        $this->correoelec = $correoelec;
        $this->telefono = $telefono;
        $this->dnipac = $dnipac;
        $this->id = $id;
        $sql = "UPDATE familiares SET dni = ?, nombre=?, apepaterno = ?, apematerno = ?, correoelec =?, telefono = ?, dnipac = ? WHERE id= ?";
        $datos = array($this->dni, $this->nombre, $this->apepaterno, $this->apematerno, $this->correoelec, $this->telefono, $this->dnipac, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarFam(int $id)
    {
        $sql = "SELECT * FROM familiares WHERE id = $id";
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
    public function accionFam(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE familiares SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
