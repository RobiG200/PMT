<?php

function verificarDpiExistentePolicia($dpi) {
    $conexion = obtenerConexion();
    $consulta = "SELECT COUNT(*) FROM policia WHERE DPI = :dpi";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':dpi', $dpi);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}


function verificarDpiExistente($dpi) {
    $conexion = obtenerConexion();
    $consulta = "SELECT COUNT(*) FROM ciudadano WHERE DpiCiudadano = :dpi";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':dpi', $dpi);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}



function obtenerTiposMulta() {
    $db = obtenerConexion();

    $query = $db->prepare("SELECT CodTipoMulta, Descripcion FROM tipomulta");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}


function actualizarMulta($CodMulta, $MontoMulta, $TipoMulta, $DescripcionMulta, $DpiCiudadano) {
    $db = obtenerConexion();
    $query = $db->prepare("
        UPDATE multa 
        SET 
            MontoMulta = ?, 
            TipoMulta = ?, 
            DescripcionMulta = ?, 
            DpiCiudadano = ? 
        WHERE 
            CodMulta = ?
    ");

    $query->execute([$MontoMulta, $TipoMulta, $DescripcionMulta, $DpiCiudadano, $CodMulta]);
}

function obtenerCiudadanosMenu() {
    $db = obtenerConexion();
    $query = $db->prepare("SELECT DpiCiudadano, Nombre FROM ciudadano");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}


function actualizarCiudadano($DpiCiudadano, $nombre, $TarjetaCirculacion, $NoPlaca, $DescripcionCarro) {
    $db = obtenerConexion();
    $query = $db->prepare("UPDATE ciudadano SET Nombre = ?, TarjetaCirculacion = ?, NoPlaca = ?, DescripcionCarro = ? WHERE DpiCiudadano = ?");
    $query->execute([$nombre, $TarjetaCirculacion, $NoPlaca, $DescripcionCarro, $DpiCiudadano]);
}




function obtenerCiudadanoPorDpi($DpiCiudadano) {
    $db = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    
    // Consulta para obtener los datos de un ciudadano
    $query = $db->prepare("
        SELECT c.DpiCiudadano, c.Nombre, c.TarjetaCirculacion, c.NoPlaca, c.DescripcionCarro
        FROM ciudadano AS c
        WHERE c.DpiCiudadano = ?
    ");
    
    $query->execute([$DpiCiudadano]);
    return $query->fetch(PDO::FETCH_OBJ);
}

function actualizarSalida($CodSalida, $hora, $fecha) {
    $db = obtenerConexion();
    $query = $db->prepare("UPDATE salida SET Hora = ?, Fecha = ? WHERE CodSalida = ?");
    $query->execute([$hora, $fecha, $CodSalida]);
}

function obtenerSalidaPorCodSalida($CodSalida) {
    $db = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    
    // Consulta para hacer el JOIN y obtener los datos relacionados de la salida
    $query = $db->prepare("
        SELECT s.CodSalida, s.Hora, s.Fecha, p.DPI, p.Nombre, p.Apellido
        FROM salida AS s
        JOIN policia AS p ON s.DpiPolicia = p.DPI
        WHERE s.CodSalida = ?
    ");
    
    $query->execute([$CodSalida]);
    return $query->fetch(PDO::FETCH_OBJ);
}



function actualizarEntrada($CodEntrada, $hora, $fecha) {
    $db = obtenerConexion();
    $query = $db->prepare("UPDATE entrada SET Hora = ?, Fecha = ? WHERE CodEntrada = ?");
    $query->execute([$hora, $fecha, $CodEntrada]);
}


function obtenerEntradaPorCodEntrada($CodEntrada) {
    $db = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    
    // Ajustamos la consulta para hacer el JOIN y obtener los datos relacionados
    $query = $db->prepare("
        SELECT e.CodEntrada, e.Hora, e.Fecha, p.DPI, p.Nombre, p.Apellido
        FROM entrada AS e
        JOIN policia AS p ON e.DpiPolicia = p.DPI
        WHERE e.CodEntrada = ?
    ");
    
    $query->execute([$CodEntrada]);
    return $query->fetch(PDO::FETCH_OBJ);
}


// Función para actualizar los datos del agente
function actualizarPolicia($DPI, $nombre, $apellido, $edad, $direccion) {
    $conexion = obtenerConexion();
    $query = $conexion->prepare("UPDATE policia SET Nombre = ?, Apellido = ?, Edad = ?, Direccion = ? WHERE DPI = ?");
    $query->execute([$nombre, $apellido, $edad, $direccion, $DPI]);
}

function obtenerPoliciaPorDPI($DPI) {
    $db = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $query = $db->prepare("SELECT * FROM policia WHERE DPI = ?");
    $query->execute([$DPI]); // Cambiado a $query en lugar de $sentencia
    return $query->fetch(PDO::FETCH_OBJ);
}


function obtenerPolicia()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT DPI, Nombre,Apellido,Edad, Direccion FROM policia");
    return $sentencia->fetchAll();
}

function obtenerCiudadano()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT DpiCiudadano, Nombre, TarjetaCirculacion, NoPlaca, DescripcionCarro FROM Ciudadano");
    return $sentencia->fetchAll();
}

function obtenerEntrada()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT e.CodEntrada, e.Hora, e.Fecha, p.DPI, p.Nombre, p.Apellido 
                              FROM entrada e 
                              JOIN policia p ON e.DpiPolicia = p.DPI");
    return $sentencia->fetchAll();
}




function obtenerMultas($dpiBuscado = null, $tipoMultaBuscado = null)
{
    $bd = obtenerConexion();

    // Base de la consulta SQL
    $sql = "SELECT m.CodMulta, m.MontoMulta, t.Nombre as NMulta, m.DescripcionMulta, c.DpiCiudadano, c.Nombre
            FROM multa m 
            JOIN Ciudadano c ON m.DpiCiudadano = c.DpiCiudadano
            JOIN TipoMulta t ON m.TipoMulta = t.CodTipoMulta";

    // Añadir condiciones dinámicas si se busca por DPI o tipo de multa
    $conditions = [];
    if ($dpiBuscado) {
        $conditions[] = "c.DpiCiudadano = :dpi";
    }
    if ($tipoMultaBuscado) {
        $conditions[] = "t.CodTipoMulta = :tipoMulta";
    }
    
    // Si hay condiciones, añadirlas a la consulta SQL
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    // Preparar la consulta
    $sentencia = $bd->prepare($sql);

    // Asignar valores a los parámetros si corresponden
    if ($dpiBuscado) {
        $sentencia->bindParam(':dpi', $dpiBuscado);
    }
    if ($tipoMultaBuscado) {
        $sentencia->bindParam(':tipoMulta', $tipoMultaBuscado);
    }

    // Ejecutar la consulta y devolver los resultados
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}


function obtenerMultaPorCod($CodMulta) {
    $db = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    
    // Consulta para obtener los datos de una multa
    $query = $db->prepare("
        SELECT m.CodMulta, m.MontoMulta, t.Nombre AS NMulta, m.DescripcionMulta, m.DpiCiudadano, c.Nombre
        FROM multa AS m
        JOIN ciudadano AS c ON m.DpiCiudadano = c.DpiCiudadano
        JOIN TipoMulta AS t ON m.TipoMulta = t.CodTipoMulta
        WHERE m.CodMulta = ?
    ");
    
    $query->execute([$CodMulta]);
    return $query->fetch(PDO::FETCH_OBJ);
}


function obtenerSalida()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT e.CodSalida, e.Hora, e.Fecha, p.DPI, p.Nombre, p.Apellido 
                              FROM salida e 
                              JOIN policia p ON e.DpiPolicia = p.DPI");
    return $sentencia->fetchAll();
}




function iniciarSesionSiNoEstaIniciada()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function eliminarPolicia($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM policia WHERE DPI = ?");
    return $sentencia->execute([$id]);
}

function eliminarEntrada($codEntrada)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM entrada WHERE CodEntrada = ?");
    return $sentencia->execute([$codEntrada]);
}

function eliminarSalida($codSalida)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM salida WHERE CodSalida = ?");
    return $sentencia->execute([$codSalida]);
}

function eliminarCiudadano($codSalida)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM Ciudadano WHERE DpiCiudadano = ?");
    return $sentencia->execute([$codSalida]);
}

function eliminarMulta($CodMulta)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM multa WHERE CodMulta = ?");
    return $sentencia->execute([$CodMulta]);
}





function guardarPolicia($dpi, $nombre, $apellido, $edad, $direccion)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO policia(DPI, Nombre, Apellido, Edad, Direccion) VALUES(?, ?, ?, ?, ?)");
    return $sentencia->execute([$dpi, $nombre, $apellido, $edad, $direccion]);
}

function guardarEntrada($hora, $fecha, $dpiPolicia) {
    $bd = obtenerConexion();
        $sentencia = $bd->prepare("INSERT INTO entrada (Hora, Fecha, DpiPolicia) VALUES (?, ?, ?)");
        $resultado = $sentencia->execute([$hora, $fecha, $dpiPolicia]);

}

function guardarSalida($hora, $fecha, $dpiPolicia) {
    $bd = obtenerConexion();
        $sentencia = $bd->prepare("INSERT INTO salida (Hora, Fecha, DpiPolicia) VALUES (?, ?, ?)");

        $resultado = $sentencia->execute([$hora, $fecha, $dpiPolicia]);

}

function guardarCiudadano($dpi,$nombre, $tarjetaCirculacion, $noPlaca, $descripcionCarro) {
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO Ciudadano (DpiCiudadano,Nombre, TarjetaCirculacion, NoPlaca, DescripcionCarro) VALUES (?,?, ?, ?, ?)");

    $resultado = $sentencia->execute([$dpi,$nombre, $tarjetaCirculacion, $noPlaca, $descripcionCarro]);

    return $resultado; 
}

function guardarMulta($montoMulta, $tipoMulta, $descripcionMulta, $dpiCiudadano) {
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO multa (MontoMulta, TipoMulta, DescripcionMulta, DpiCiudadano) VALUES (?, ?, ?, ?)");

    $resultado = $sentencia->execute([$montoMulta, $tipoMulta, $descripcionMulta, $dpiCiudadano]);

    return $resultado;
}



function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}
function obtenerConexion()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
