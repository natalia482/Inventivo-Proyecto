<?php 
require_once('../DAO/ProductoDAO.php');
require_once('../VO/ProductoVO.php');

// Configuración de cabeceras para CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$crud = new crudProducto(); // Crear instancia del CRUD Producto
$method = $_SERVER['REQUEST_METHOD']; // Obtener el método HTTP

try {
    switch ($method) {
        case 'GET':
            $producto = $crud->obtenerProducto();
            break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true); // Capturar datos JSON
        if (isset($data['nom_producto'], $data['num_bolsa'], $data['v_unitario'], $data['cantidad'], $data['estado'])) {
            $producto = new Producto();
            $producto->setNom_producto($data['nom_producto']);
            $producto->setNum_bolsa($data['num_bolsa']);
            $producto->setV_unitario($data['v_unitario']);
            $producto->setCantidad($data['cantidad']);
            $producto->setEstado($data['estado']);
            $result = $crud->insertarProducto($producto);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Producto registrado exitosamente.']);
                
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al registrar el producto.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Datos incompletos.']);
        }
        break;


        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
        
            // Asegúrate de que se reciban todos los datos requeridos
            if (isset($data['id_producto'], $data['nom_producto'], $data['v_unitario'], $data['cantidad'])) {
                
                // Crear el objeto Producto y setear los valores
                $producto = new Producto();
                $producto->setId_producto($data['id_producto']);
                $producto->setNom_producto($data['nom_producto']);
                $producto->setV_unitario($data['v_unitario']);
                $producto->setCantidad($data['cantidad']);
                
                // Si el campo 'estado' no se encuentra en los datos, asignar un valor por defecto o ignorarlo
                if (isset($data['estado'])) {
                    $producto->setEstado($data['estado']);
                }
        
                // Actualizar el producto
                if ($crud->actualizarProducto($producto)) {
                    echo json_encode(["mensaje" => "Producto actualizado con éxito."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["mensaje" => "Error al actualizar el producto."]);
                }
            } else {
                http_response_code(400);
                echo json_encode(["mensaje" => "Datos incompletos para actualizar el producto."]);
            }
            break;
        

        case 'DELETE':
            if (isset($_GET['id_producto'])) {
                $id_producto = $_GET['id_producto'];
                if ($crud->eliminarProducto($id_producto)) {
                    echo json_encode(["mensaje" => "Producto eliminado con éxito."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["mensaje" => "Error al eliminar el producto."]);
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
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["mensaje" => "Error en el servidor.", "error" => $e->getMessage()]);
}
?>
