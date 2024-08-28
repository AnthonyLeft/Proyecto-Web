<?php
class Autor {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function crear($nombre, $biografia) {
        $query = "INSERT INTO autores (nombre, biografia) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre, $biografia]);
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM autores";
        $result = $this->db->query($query);
        if ($result === false) {
            error_log("Error en la consulta SQL: " . $this->db->errorInfo()[2]);
            return false;
        }
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM autores WHERE id = ?";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$id]) === false) {
            error_log("Error en la consulta SQL: " . $stmt->errorInfo()[2]);
            return false;
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $biografia) {
        $query = "UPDATE autores SET nombre = ?, biografia = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre, $biografia, $id]);
    }

    public function eliminar($id) {
        $query = "DELETE FROM autores WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
