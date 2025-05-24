<?php 
class Empresa {

    private $id_empresa;
    private $razon_social;
    private $direccion_empresa;
    private $telefono_empresa;
    private $tipo_documento;
    private $num_documento;
    private $correo;
    private $id_admin;

    public function getId_empresa() {
        return $this->id_empresa;
    }

    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    public function getRazon_social() {
        return $this->razon_social;
    }

    public function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    public function getDireccion_empresa() {
        return $this->direccion_empresa;
    }

    public function setDireccion_empresa($direccion_empresa) {
        $this->direccion_empresa = $direccion_empresa;
    }

    public function getTelefono_empresa() {
        return $this->telefono_empresa;
    }

    public function setTelefono_empresa($telefono_empresa) {
        $this->telefono_empresa = $telefono_empresa;
    }

    public function getTipo_documento() {
        return $this->tipo_documento;
    }

    public function setTipo_documento($tipo_documento) {
        $this->tipo_documento = $tipo_documento;
    }

    public function getNum_documento() {
        return $this->num_documento;
    }

    public function setNum_documento($num_documento) {
        $this->num_documento = $num_documento;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getId_admin() {
        return $this->id_admin;
    }

    public function setId_admin($id_admin) {
        $this->id_admin = $id_admin;
    }
}
?>
