<?php
require_once 'Controladores/BD/db.php';
require_once 'Controladores/LibroController.php';
require_once 'Controladores/AutorController.php';

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
$url = explode('/', $url);

$libroController = new LibroController($db);
$autorController = new AutorController($db);
$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($url[0] == 'libro') {
    switch ($method) {
        case 'post':
            if (isset($url[1]) && $url[1] == 'crear') {
                $libroController->crearLibro();
            }
            break;
        case 'get':
            if (isset($url[1]) && $url[1] == 'listar') {
                $libroController->obtenerLibros();
            } elseif (isset($url[1]) && is_numeric($url[1])) {
                $libroController->obtenerLibro($url[1]);
            }
            break;
        case 'put':
            if (isset($url[1]) && is_numeric($url[1])) {
                $libroController->actualizarLibro($url[1]);
            }
            break;
        case 'delete':
            if (isset($url[1]) && is_numeric($url[1])) {
                $libroController->eliminarLibro($url[1]);
            }
            break;
        default:
            echo json_encode(["mensaje" => "Método no soportado"]);
    }
} elseif ($url[0] == 'autor') {
    switch ($method) {
        case 'post':
            if (isset($url[1]) && $url[1] == 'crear') {
                $autorController->crearAutor();
            }
            break;
        case 'get':
            if (isset($url[1]) && $url[1] == 'listar') {
                $autorController->obtenerAutores();
            } elseif (isset($url[1]) && is_numeric($url[1])) {
                $autorController->obtenerAutor($url[1]);
            }
            break;
        case 'put':
            if (isset($url[1]) && is_numeric($url[1])) {
                $autorController->actualizarAutor($url[1]);
            }
            break;
        case 'delete':
            if (isset($url[1]) && is_numeric($url[1])) {
                $autorController->eliminarAutor($url[1]);
            }
            break;
        default:
            echo json_encode(["mensaje" => "Método no soportado"]);
    }
} else {
    echo json_encode(["mensaje" => "Ruta no encontrada"]);
}
?>
