<?php
class DiagnosticoModel extends Query
{
    private  $dnipac, $medicamento, $detalles, $id ,$estado;
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
    public function getDiagnostico()
    {
        $sql =  "SELECT * FROM diagnostico";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarDiagnostico(
        string $dnipac,
        string $medicamento,
        string $detalles
        
    ) {
        $this->dnipac = $dnipac;
        $this->medicamento = $medicamento;
        $this->detalles = $detalles;
        $verificar = "SELECT * FROM diagnostico WHERE dnipac ='$this->dnipac'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO diagnostico(dnipac, medicamento, detalles) VALUES(?,?,?)";
            $datos = array($this->dnipac, $this->medicamento, $this->detalles);
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

    public function modificarDiagnostico(
        string $dnipac,
        string $medicamento,
        string $detalles,
        int $id
    ) {
        $this->dnipac = $dnipac;
        $this->medicamento = $medicamento;
        $this->detalles = $detalles;
        $this->id = $id;
        $sql = "UPDATE diagnostico SET dnipac = ?, medicamento=?, detalles = ? WHERE id= ?";
        $datos = array($this->dnipac, $this->medicamento, $this->detalles, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarDia(int $id)
    {
        $sql = "SELECT * FROM diagnostico WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    /*public function eliminarUser(int $id){
            $this->id = $id;
            $sql = "UPDATE dnipac SET estado = 0 WHERE id = ?";
            $datos = array($this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }*/
    public function accionDia(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE diagnostico SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
