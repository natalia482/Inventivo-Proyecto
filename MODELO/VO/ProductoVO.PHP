<?php 

/**
 * 
 */
class Producto{

		private $id_producto;
		private $nom_producto;
		private $num_bolsa;
		private $v_unitario;
		private $cantidad;
		private $estado;


		public function getId_producto(){
			return $this->id_producto;
		}
	
		public function setId_producto($id_producto){
			$this->id_producto = $id_producto;
		}
	

		public function getNom_producto(){
			return $this->nom_producto;
		}
	
		public function setNom_producto($nom_producto){
			$this->nom_producto = $nom_producto;
		}
	
		public function getNum_bolsa(){
			return $this->num_bolsa;
		}
	
		public function setNum_bolsa($num_bolsa){
			$this->num_bolsa = $num_bolsa;
		}
	
		public function getV_unitario(){
			return $this->v_unitario;
		}
	
		public function setV_unitario($v_unitario){
			$this->v_unitario = $v_unitario;
		}
	
		public function getcantidad(){
			return $this->cantidad;
		}
	
		public function setcantidad($cantidad){
			$this->cantidad = $cantidad;
		}
	
		public function getEstado(){
			return $this->estado;
		}
	
		public function setEstado($estado){
			$this->estado = $estado;
		}

}





 ?> 