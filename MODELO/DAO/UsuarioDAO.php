<?php 
	require_once('../CONEXION/conexion.php');
	require_once('../VO/UsuarioVO.php');
		
		class CrudUsuario{

			public function __construct(){}
			//Funcion para obtener el usuario
			public function obtenerUsuario() {
				try {
					$db = DB::conectar();
					$select = $db->prepare('SELECT * FROM usuarios');
					$select->execute();
					$usuario = $select->fetchAll(PDO::FETCH_ASSOC);
					echo json_encode($usuario);
					// Si el producto no existe, se devuelve null
					if ($usuario) {
						return $usuario;
					} else {
						return null; // Producto no encontrado
					}
				} catch (PDOException $e) {
					// Manejo de errores
					error_log("Error al obtener el usuario: " . $e->getMessage());
					return null; // Devuelve null en caso de error
				}
			}

			//Función para insertar usuario
			public function insertarUsuario($usuario) {
				try {
					$db = DB::conectar();
					$insert = $db->prepare('
						INSERT INTO usuarios (rol_usuario, nom_usuario, apellido_usuario, ciudad_usuario, tipo_documento, num_documento, email_usuario, usuario, contraseña)
						VALUES (:rol, :name, :apellido, :ciudad, :tdocumento, :document, :email, :usuario, :clave)
					');
					$rol = $usuario->getRol();
					$nombre = $usuario->getNom_usuario();
					$apellido = $usuario->getApellido_usuario();
					$ciudad =$usuario->getCiudad_usuario();
					$tdocument =$usuario->getTipo_documento();
					$document =$usuario->getNum_documento();
					$correo =$usuario->getEmail_usuario();
					$user =$usuario->getUsuario();
					$password=$usuario->getContraseña();

					$insert->bindValue('rol', $rol);
					$insert->bindValue('name', $nombre);
					$insert->bindValue('apellido',$apellido);
					$insert->bindValue('ciudad', $ciudad);
					$insert->bindValue('tdocumento', $tdocument);
					$insert->bindValue('document', $document);
					$insert->bindValue('email',$correo);
					$insert->bindValue('usuario', $user);
			
					// Encriptar la contraseña
					$pass = password_hash($password, PASSWORD_DEFAULT);
					$insert->bindValue('clave', $pass);
			
					// Verifica si la ejecución fue exitosa
					try {
						$insert->execute();
						return true; // Si se ejecuta correctamente
					} catch (PDOException $e) {
						// Si hay un error, lo captura
						echo 'Error en la inserción: ' . $e->getMessage();
						return false;
					}
				} catch (PDOException $e) {
					// Manejo de errores
					error_log("Error al insertar usuario: " . $e->getMessage());
					return false; // Fallo en la inserción
				}
			}
			 
			//Función para actualizar un usuario
			public function actualizarUsuario($id, $usuario) {
				try {
					$db = DB::conectar();
					$update = $db->prepare('
						UPDATE usuarios 
						SET 
							rol_usuario = :rol, 
							nom_usuario = :name, 
							apellido_usuario = :apellido, 
							ciudad_usuario = :ciudad, 
							tipo_documento = :tdocumento, 
							num_documento = :document, 
							email_usuario = :email, 
							usuario = :usuario
						WHERE id_usuario = :id
					');
			
					$update->bindValue('id', $id);
					$update->bindValue('rol', $usuario->getRol());
					$update->bindValue('name', $usuario->getNom_usuario());
					$update->bindValue('apellido', $usuario->getApellido_usuario());
					$update->bindValue('ciudad', $usuario->getCiudad_usuario());
					$update->bindValue('tdocumento', $usuario->getTipo_documento());
					$update->bindValue('document', $usuario->getNum_documento());
					$update->bindValue('email', $usuario->getEmail_usuario());
					$update->bindValue('usuario', $usuario->getUsuario());
			
					$resultado = $update->execute();
					return $resultado; // Devuelve true si se ejecuta correctamente
				} catch (PDOException $e) {
					error_log("Error al actualizar usuario: " . $e->getMessage());
					return false;
				}
			}
			public function eliminarUsuario($id_usuario) {
				try {
					$db = DB::conectar();
					$delete = $db->prepare('DELETE FROM usuarios WHERE id_usuario = :id');
					$delete->bindParam(':id', $id_usuario);
					
					if ($delete->execute()) {
						return true; // Eliminación exitosa
					} else {
						return false; // Error en la eliminación
					}
				} catch (PDOException $e) {
					// Manejo de errores
					error_log("Error al eliminar un usuario: " . $e->getMessage());
					return false;
				}
			}

			//busca el nombre del usuario si existe
			public function buscarUsuario($nombre){
				$db=Db::conectar();
				$select=$db->prepare('SELECT * FROM usuarios WHERE usuario=:nombre');
				$select->bindValue('nombre',$nombre);
				$select->execute();
				$registro=$select->fetch();
				if($registro['id_usuario']!=NULL){
					$usado=False;
				}else{
					$usado=True;
				}	
				return $usado;
			}
			public function obtenerUsuarioNombre($nombre,$clave){
				#ESTABLECER LA CONEXION CON LA BASE DE DATOS
				$db=db::conectar();
				#ESTABLECER LA SENTENCIA DE SQL PARA LA CONSULTA PREPARADA
				$select=$db->prepare('SELECT * FROM usuarios WHERE usuario=:nombre');
				#ENVIAR LOS PARAMETROS A LA SENTENCIA SQL 
				$select->bindValue('nombre',$nombre);
				#$select->bindValue('pas',$aprrenticies->getapPassaword());
				#EJECUTAR SENTENCIA SQL
				$select->execute();
				#CONVERTIR EL RESULTADO DE LA CONSULTA A UN ARREGLO
				$array=$select->fetch();

				
				#VALIDAR SI EL RESULTADO NO HAY NINGUN VALOR
				if (empty($array)) {
					#CERRAR CONEXION
					$db = null;
					$select = null;
					#RETORNAR EL RESPECTIVO MENSAJE
					return $array;
				#COMPARAR Y VALIDAR SI LA FICHA CORRESPONDE A LA CAPTURADA EN EL FORMULARIO UTILIZANDO EL METODO GET DE LA CLASE APPRENTICIE VO
				}

				else {
					#CERRAR CONEXION
					$db = null;
					$select = null;
					#SI LOS DATOS SON CORRECTOS RETORNAR CONFIRMACION
					return $array;
				}	

			}
			
		}
	?>