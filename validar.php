<?php
include_once "funciones.php";
session_start();

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Obtener la conexión a la base de datos
$conexion = obtenerConexion();

// Preparar la consulta para evitar inyección SQL
$consulta = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
$stmt = $conexion->prepare($consulta);

// Bind de parámetros
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':contrasena', $contraseña);

// Ejecutar la consulta
$stmt->execute();

// Verificar si se encontraron filas
if ($stmt->rowCount() > 0) {
    // Obtener los datos del usuario
    $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Guardar en sesión el nombre de usuario y rol
    $_SESSION['usuario'] = $usuarioData['usuario'];
    $_SESSION['rol'] = $usuarioData['rol']; // Asumiendo que la columna es 'rol'

    // Redirigir a la página de inicio
    header("location:Inicio.php");
} else {
    include("index.php");
    echo '<h1 class="bad">ERROR DE AUTENTIFICACION</h1>';
}
?>