<?php 
    require_once('../CONEXION/conexion.php');
	
	class crudProducto{

		public function __construct(){}

		public function obtenerProducto() {
			try {
				$db = DB::conectar();
				$select = $db->prepare('SELECT * FROM producto');
				$select->execute();
				$producto = $select->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($producto);
				// Si el producto no existe, se devuelve null
				if ($producto) {
					return $producto;
				} else {
					return null; // Producto no encontrado
				}
			} catch (PDOException $e) {
				// Manejo de errores
				error_log("Error al obtener producto: " . $e->getMessage());
				return null; // Devuelve null en caso de error
			}
		}
		
		

		public function insertarProducto($producto) {
			try {
				$db = DB::conectar();
				$insert = $db->prepare('INSERT INTO producto (nom_producto, num_bolsa, v_unitario, cantidad, estado, fecha_registroproducto) VALUES (:nameproduc, :numbol, :vuni, :cantidad, :estado, NOW())');

				//Variables intermedias (PORQUE BINDPARAM ACEPTA ES VARIABLES NO METODOS O EXPRESIONES)
				//$id_producto = $producto->getId_producto();
				$nombre = $producto->getNom_producto();
				$numbolsa=$producto ->getNum_bolsa();
				$v_unitario =$producto->getV_unitario();
				$cantidad = $producto->getCantidad();
				$estado = $producto->getEstado();	
				
				$insert->bindParam(':nameproduc', $nombre);
				$insert->bindParam(':numbol', $numbolsa);
				$insert->bindParam(':vuni', $v_unitario);
				$insert->bindParam(':cantidad', $cantidad);
				$insert->bindParam(':estado', $estado);
		
				if ($insert->execute()) {
					// Retorna el ID del producto insertado
					return $db->lastInsertId();
				} else {
					// En caso de error en la ejecución
					return false;
				}
			} catch (PDOException $e) {
				// Manejo de errores
				error_log("Error al insertar producto: " . $e->getMessage());
				return false;
			}
		}
		
		public function actualizarProducto($producto) {
			try {
				$db = DB::conectar();
				$update = $db->prepare('UPDATE producto 
										SET nom_producto = :nameproduc, 
											num_bolsa = :numbol, 
											v_unitario = :vuni, 
											cantidad = :cantidad, 
											estado = :estado 
										WHERE id_producto = :id');
				//Variables intermedias (PORQUE BINDPARAM ACEPTA ES VARIABLES NO METODOS O EXPRESIONES)
				$id_producto = $producto->getId_producto();
				$nombre = $producto->getNom_producto();
				$numbolsa=$producto ->getNum_bolsa();
				$v_unitario =$producto->getV_unitario();
				$cantidad = $producto->getCantidad();
				$estado = $producto->getEstado();	
				
				//Asociar las variables a los parametros
				$update->bindParam(':id', $id_producto);
				$update->bindParam(':nameproduc', $nombre);
				$update->bindParam(':numbol', $numbolsa);
				$update->bindParam(':vuni', $v_unitario);
				$update->bindParam(':cantidad', $cantidad);
				$update->bindParam(':estado', $estado);
				
				if ($update->execute()) {
					return true; // Actualización exitosa
				} else {
					return false; // Error en la actualización
				}
			} catch (PDOException $e) {
				// Manejo de errores
				error_log("Error al actualizar producto: " . $e->getMessage());
				return false;
			}
		}
		public function eliminarProducto($id_producto) {
			try {
				$db = DB::conectar();
				$delete = $db->prepare('DELETE FROM producto WHERE id_producto = :id');
				$delete->bindParam(':id', $id_producto);
				
				if ($delete->execute()) {
					return true; // Eliminación exitosa
				} else {
					return false; // Error en la eliminación
				}
			} catch (PDOException $e) {
				// Manejo de errores
				error_log("Error al eliminar producto: " . $e->getMessage());
				return false;
			}
		}
			
		public function buscarProducto($producto) {
			try {
				$db = DB::conectar();
				$select = $db->prepare('SELECT * FROM producto WHERE nom_producto = :nombre');
				$select->bindValue(':nombre', $producto);
				$select->execute();
				$registro = $select->fetch();
				// Verifica si se encontró el producto en la base de datos
				if ($registro['id_producto']!=NULL) {
					$usado=False;  // Producto encontrado
				} else {
					$usado=True; // Producto no encontrado
				}
				return $usado;
			} catch (PDOException $e) {
				// Manejo de errores
				error_log("Error al buscar producto: " . $e->getMessage());
				return false;
			}
		}
		
	}
?>