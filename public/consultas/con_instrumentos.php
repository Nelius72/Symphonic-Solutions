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

$query = "SELECT * FROM instrumento";
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
