<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=examen', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Error en la conexión a la base de datos: " . $e->getMessage());
    exit("Error en la conexión a la base de datos.");
}
?>
