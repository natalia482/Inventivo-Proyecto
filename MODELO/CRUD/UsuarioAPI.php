<?php
require_once('../DAO/UsuarioDAO.php');
require_once('../VO/UsuarioVO.php');
//Configuracion de cabeceras para CORS

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: https://tudominio.netlify.app");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type");
$crud = new CrudUsuario();
//Definir las operaciones en función del método HTTP
$method =$_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $usuario = $crud->obtenerUsuario();
        break;

        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            if (isset($data['rol_usuario'], $data['nom_usuario'], $data['apellido_usuario'], $data['ciudad_usuario'], $data['tipo_documento'], $data['num_documento'], $data['email_usuario'], $data['usuario'], $data['contraseña'])) {
                $usuario = new UsuarioVO();
                $usuario->setRol($data['rol_usuario']);
                $usuario->setNom_usuario($data['nom_usuario']);
                $usuario->setApellido_usuario($data['apellido_usuario']);
                $usuario->setCiudad_usuario($data['ciudad_usuario']);
                $usuario->setTipo_documento($data['tipo_documento']);
                $usuario->setNum_documento($data['num_documento']);
                $usuario->setEmail_usuario($data['email_usuario']);
                $usuario->setUsuario($data['usuario']);
                $usuario->setContraseña($data['contraseña']);
        
                if ($crud->insertarUsuario($usuario)) {
                    echo json_encode(['success' => true, 'message' => 'Usuario registrado con éxito']);
                    
                   

                } else {
                    echo json_encode(['success' => false, 'message' => 'Error al registrar usuario']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
            }
            break;
        case 'PUT':
            // Capturar datos JSON del cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);
        
            // Verificar que se envíen todos los datos necesarios y el ID
            if (isset($data['id_usuario'], $data['rol_usuario'], $data['nom_usuario'], $data['apellido_usuario'], $data['ciudad_usuario'], $data['tipo_documento'], $data['num_documento'], $data['email_usuario'], $data['usuario'])) {
                $id = $data['id_usuario'];
                
                // Crear un objeto UsuarioVO con los datos recibidos
                $usuario = new UsuarioVO();
                $usuario->setRol($data['rol_usuario']);
                $usuario->setNom_usuario($data['nom_usuario']);
                $usuario->setApellido_usuario($data['apellido_usuario']);
                $usuario->setCiudad_usuario($data['ciudad_usuario']);
                $usuario->setTipo_documento($data['tipo_documento']);
                $usuario->setNum_documento($data['num_documento']);
                $usuario->setEmail_usuario($data['  ']);
                $usuario->setUsuario($data['usuario']);
        
                // Llamar al método de actualización
                $resultado = $crud->actualizarUsuario($id, $usuario);
        
                if ($resultado) {
                    http_response_code(200);
                    echo json_encode(["mensaje" => "Usuario actualizado exitosamente."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["mensaje" => "Error al actualizar usuario."]);
                }
            } else {
                http_response_code(400);
                echo json_encode(["mensaje" => "Datos incompletos para la actualización."]);
            }
            break; 
            case 'DELETE':
                if (isset($_GET['id_usuario'])) {
                    $id_usuario = $_GET['id_usuario'];
                    if ($crud->eliminarUsuario($id_usuario)) {
                        echo json_encode(["mensaje" => "Usuario eliminado con éxito."]);
                    } else {
                        http_response_code(500);
                        echo json_encode(["mensaje" => "Error al eliminar el usuario."]);
                    }
                } else {
                    http_response_code(400);
                    echo json_encode(["mensaje" => "ID del producto no especificado."]);
                }
                break;


    default:
    http_response_code(405);
    echo json_encode(["mensaje" => "Método no permitido."]);
    break;
}

?>