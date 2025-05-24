<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost"); // ajusta tu dominio frontend
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
require_once("../CONEXION/Conexion.php");

$conn = DB::conectar();
$data = json_decode(file_get_contents("php://input"), true);
error_log("Input JSON recibido: " . file_get_contents("php://input"));
error_log("Array decodificado: " . print_r($data, true));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($data['usuario']) && isset($data['password'])) {
        $usuario = $data['usuario'];
        $password = $data['password'];

        try {
            // Consulta solo para obtener el hash de la contraseña
            $query = "SELECT * FROM usuarios WHERE usuario = :usuario";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Verifica la contraseña usando password_verify
                if (password_verify($password, $user['contraseña'])) {

                    $_SESSION['usuario'] = $user['usuario'];
                    $_SESSION['id_usuario'] = $user['id_usuario'];
                    $_SESSION['rol'] = $user['rol_usuario'];
                    
                    echo json_encode([
                        "status" => "success",
                        "message" => "Inicio de sesión exitoso.",
                        "data" => [
                            "id" => $user['id_usuario'],
                            "usuario" => $user['usuario'],
                            "rol" => $user['rol_usuario']
                        ]
                    ]);
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => "Contraseña incorrecta."
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Usuario no encontrado."
                ]);
            }
        } catch (PDOException $e) {
            echo json_encode([
                "status" => "error",
                "message" => "Error en el servidor: " . $e->getMessage()
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Usuario y contraseña son obligatorios."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Método no permitido."
    ]);
}
?>