<?php
class Libro {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function crear($titulo, $autor_id, $anio_publicacion, $genero) {
        $query = "INSERT INTO libros (titulo, autor_id, anio_publicacion, genero) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$titulo, $autor_id, $anio_publicacion, $genero]);
    }

    public function obtenerTodos() {
        $query = "SELECT libros.*, autores.nombre AS autor_nombre 
                  FROM libros 
                  LEFT JOIN autores ON libros.autor_id = autores.id";
        $result = $this->db->query($query);
        if ($result === false) {
            error_log("Error en la consulta SQL: " . $this->db->errorInfo()[2]);
            return false;
        }
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $query = "SELECT libros.*, autores.nombre AS autor_nombre 
                  FROM libros 
                  LEFT JOIN autores ON libros.autor_id = autores.id 
                  WHERE libros.id = ?";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$id]) === false) {
            error_log("Error en la consulta SQL: " . $stmt->errorInfo()[2]);
            return false;
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $titulo, $autor_id, $anio_publicacion, $genero) {
        $query = "UPDATE libros SET titulo = ?, autor_id = ?, anio_publicacion = ?, genero = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$titulo, $autor_id, $anio_publicacion, $genero, $id]);
    }

    public function eliminar($id) {
        $query = "DELETE FROM libros WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
