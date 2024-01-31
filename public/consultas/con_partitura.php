<?php
$host = "localhost";
$dbname = "symphonic";
$user = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

$query = "SELECT 
*
FROM 
partitura p 
JOIN tipo_partitura tp ON p.id_tipo_partitura = tp.id_tipo_partitura 
JOIN instrumento i ON p.id_instrumento = i.id_instrumento;";
// $query = "SELECT 
// titulo_partitura, autor 
// FROM 
// partitura";
$result = $conn->query($query);

// Mostrar los resultados en formato JSON
if ($result) {
    $datos = array();
    while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
        $datos[] = $fila;
    }
    echo json_encode($datos);
} else {
    echo json_encode(array("error" => "No se encontraron resultados"));
}
