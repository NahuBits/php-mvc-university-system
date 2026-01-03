<?php
class MateriaModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function crearMateria($nombre) {
        $this->db->query("INSERT INTO materia (nombreMateria, activo) VALUES (:nombre, 1)");
        $this->db->bind(':nombre', $nombre);
        return $this->db->execute() ? $this->db->lastInsertId() : false;
    }

    public function buscarMateriasPorNombre($nombre) {
        $this->db->query("SELECT * FROM materia WHERE activo = 1 AND nombreMateria LIKE :nombre ORDER BY nombreMateria");
        $this->db->bind(':nombre', '%' . $nombre . '%');
        return $this->db->registers();
    }

    public function obtenerMateriaPorId($id) {
        $this->db->query("SELECT * FROM materia WHERE idMateria = :id");
        $this->db->bind(':id', $id);
        return $this->db->register();
    }

    public function actualizarMateria($id, $nuevoNombre) {
        $this->db->query("UPDATE materia SET nombreMateria = :nombre WHERE idMateria = :id");
        $this->db->bind(':nombre', $nuevoNombre);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function eliminarMateria($idMateria) {
        $this->db->query("UPDATE materia SET activo = 0 WHERE idMateria = :id");
        $this->db->bind(':id', $idMateria);
        return $this->db->execute();
    }

    public function activarMateria($idMateria) {
        $this->db->query("UPDATE materia SET activo = 1 WHERE idMateria = :id");
        $this->db->bind(':id', $idMateria);
        return $this->db->execute();
    }

    public function obtenerMateriasEliminadas() {
        $this->db->query("SELECT * FROM materia WHERE activo = 0 ORDER BY nombreMateria");
        return $this->db->registers();
    }

    public function obtenerTodasLasMaterias() {
        $this->db->query("SELECT * FROM materia WHERE activo = 1 ORDER BY nombreMateria");
        return $this->db->registers();
    }

    public function existeMateria($nombre) {
    $this->db->query("SELECT COUNT(*) as total FROM materia WHERE LOWER(nombreMateria) = LOWER(:nombre) AND activo = 1");
    $this->db->bind(':nombre', $nombre);
    $resultado = $this->db->register();

    return $resultado && $resultado->total > 0;
    }

    // ✅ Método nuevo: obtener materias por carrera con profesor y horarios
    public function obtenerMateriasPorCarrera($idCarrera) {
        $this->db->query("
            SELECT 
                m.nombreMateria,
                md.cuatrimestre,
                md.turno,
                md.DiaCursada,
                md.horaInicio,
                md.horaFin,
                u.Nombre AS nombreProfesor,
                u.Apellido AS apellidoProfesor
            FROM materiadictado md
            INNER JOIN materia m ON md.idMateria = m.idMateria
            INNER JOIN usuario u ON md.idProfesor = u.idUsuario
            WHERE md.idCarrera = :idCarrera AND md.activo = 1
            ORDER BY md.cuatrimestre, m.nombreMateria
        ");
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->registers();
    }
}
