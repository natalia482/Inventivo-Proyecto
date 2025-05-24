<?php 
	/*
	*
	*
	*/
	class UsuarioVO{
		private $id_usuario;
		private $rol;
		private $nom_usuario;
		private $apellido_usuario;
		private $ciudad_usuario;
		private $tipo_documento;
		private $num_documento;
		private $email_usuario;
		private $usuario;
		private $contraseña;

		public function getId_usuario(){
			return $this->id_usuario;
		}
	
		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}
	
		public function getRol(){
			return $this->rol;
		}
	
		public function setRol($rol){
			$this->rol = $rol;
		}
	
		public function getNom_usuario(){
			return $this->nom_usuario;
		}
	
		public function setNom_usuario($nom_usuario){
			$this->nom_usuario = $nom_usuario;
		}
	
		public function getApellido_usuario(){
			return $this->apellido_usuario;
		}
	
		public function setApellido_usuario($apellido_usuario){
			$this->apellido_usuario = $apellido_usuario;
		}
	
		public function getCiudad_usuario(){
			return $this->ciudad_usuario;
		}
	
		public function setCiudad_usuario($ciudad_usuario){
			$this->ciudad_usuario = $ciudad_usuario;
		}
	
		public function getTipo_documento(){
			return $this->tipo_documento;
		}
	
		public function setTipo_documento($tipo_documento){
			$this->tipo_documento = $tipo_documento;
		}
	
		public function getNum_documento(){
			return $this->num_documento;
		}
	
		public function setNum_documento($num_documento){
			$this->num_documento = $num_documento;
		}
	
		public function getEmail_usuario(){
			return $this->email_usuario;
		}
	
		public function setEmail_usuario($email_usuario){
			$this->email_usuario = $email_usuario;
		}
	
		public function getUsuario(){
			return $this->usuario;
		}
	
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
	
		public function getContraseña(){
			return $this->contraseña;
		}
	
		public function setContraseña($contraseña){
			$this->contraseña = $contraseña;
		}
}
?>