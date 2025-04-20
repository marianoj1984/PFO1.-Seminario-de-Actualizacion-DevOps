<?php
header("Content-Type: application/json");

// Obtener los datos enviados por el frontend
$input = json_decode(file_get_contents("php://input"), true);

// Verificar que los campos requeridos estén presentes
if (!isset($input["nombre"]) || !isset($input["apellido"]) || !isset($input["dni"]) || !isset($input["usuario"]) || !isset($input["password"])) {
    echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
    exit;
}

// Limpiar y validar los datos recibidos
$nombre = trim($input["nombre"]);
$apellido = trim($input["apellido"]);
$dni = trim($input["dni"]);
$usuario = trim($input["usuario"]);
$password = trim($input["password"]);

// Verificación básica de los datos
if (empty($nombre) || empty($apellido) || empty($dni) || empty($usuario) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Campos vacíos"]);
    exit;
}

// Simulación de validación de datos en backend
if (strlen($dni) !== 8 || !ctype_digit($dni)) {
    echo json_encode(["status" => "error", "message" => "DNI inválido"]);
    exit;
}

// Respuesta exitosa
echo json_encode(["status" => "ok", "message" => "Datos recibidos correctamente"]);
?>
