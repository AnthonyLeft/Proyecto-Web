<?php
require_once 'Controladores/BD/db.php';
require_once 'Modelos/Autor.php';

class AutorController {
    private $model;

    public function __construct($db) {
        $this->model = new Autor($db);
    }

    public function crearAutor() {
        $data = json_decode(file_get_contents("php://input"));
        if ($this->model->crear($data->nombre, $data->biografia)) {
            echo json_encode(["mensaje" => "Autor creado exitosamente"]);
        } else {
            echo json_encode(["mensaje" => "Error al crear el autor"]);
        }
    }

    public function obtenerAutores() {
        $autores = $this->model->obtenerTodos();
        if ($autores === false) {
            echo json_encode(["mensaje" => "Error al obtener los autores"]);
        } else {
            echo json_encode($autores);
        }
    }

    public function obtenerAutor($id) {
        $autor = $this->model->obtenerPorId($id);
        if ($autor === false) {
            echo json_encode(["mensaje" => "Error al obtener el autor"]);
        } else {
            echo json_encode($autor);
        }
    }

    public function actualizarAutor($id) {
        $data = json_decode(file_get_contents("php://input"));
        if ($this->model->actualizar($id, $data->nombre, $data->biografia)) {
            echo json_encode(["mensaje" => "Autor actualizado exitosamente"]);
        } else {
            echo json_encode(["mensaje" => "Error al actualizar el autor"]);
        }
    }

    public function eliminarAutor($id) {
        if ($this->model->eliminar($id)) {
            echo json_encode(["mensaje" => "Autor eliminado exitosamente"]);
        } else {
            echo json_encode(["mensaje" => "Error al eliminar el autor"]);
        }
    }
}
?>
