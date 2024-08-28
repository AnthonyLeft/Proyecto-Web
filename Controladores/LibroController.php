<?php
require_once 'Controladores/BD/db.php';
require_once 'Modelos/Libro.php';

class LibroController {
    private $model;

    public function __construct($db) {
        $this->model = new Libro($db);
    }

    public function crearLibro() {
        $data = json_decode(file_get_contents("php://input"));
        if ($this->model->crear($data->titulo, $data->autor_id, $data->anio_publicacion, $data->genero)) {
            echo json_encode(["mensaje" => "Libro creado exitosamente"]);
        } else {
            echo json_encode(["mensaje" => "Error al crear el libro"]);
        }
    }

    public function obtenerLibros() {
        $libros = $this->model->obtenerTodos();
        if ($libros === false) {
            echo json_encode(["mensaje" => "Error al obtener los libros"]);
        } else {
            echo json_encode($libros);
        }
    }

    public function obtenerLibro($id) {
        $libro = $this->model->obtenerPorId($id);
        if ($libro === false) {
            echo json_encode(["mensaje" => "Error al obtener el libro"]);
        } else {
            echo json_encode($libro);
        }
    }

    public function actualizarLibro($id) {
        $data = json_decode(file_get_contents("php://input"));
        if ($this->model->actualizar($id, $data->titulo, $data->autor_id, $data->anio_publicacion, $data->genero)) {
            echo json_encode(["mensaje" => "Libro actualizado exitosamente"]);
        } else {
            echo json_encode(["mensaje" => "Error al actualizar el libro"]);
        }
    }

    public function eliminarLibro($id) {
        if ($this->model->eliminar($id)) {
            echo json_encode(["mensaje" => "Libro eliminado exitosamente"]);
        } else {
            echo json_encode(["mensaje" => "Error al eliminar el libro"]);
        }
    }
}
?>
