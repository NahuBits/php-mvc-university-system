<?php
class AlumnoModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Devuelve todas las carreras activas
    public function obtenerCarrerasDisponibles() {
        $this->db->query("SELECT * FROM carrera WHERE activo = 1");
        return $this->db->registers();
    }

    // Devuelve las materias de una carrera con datos de dictado y profesor
    public function obtenerMateriasPorCarrera($idCarrera) {
        $this->db->query("
            SELECT 
                m.nombreMateria AS nombreMateria,
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
        ");
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->registers();
    }

    // Devuelve el nombre de una carrera por ID
    public function obtenerNombreCarrera($idCarrera) {
        $this->db->query("SELECT nombreCarrera FROM carrera WHERE idCarrera = :idCarrera");
        $this->db->bind(':idCarrera', $idCarrera);
        $row = $this->db->register();
        return $row ? $row->nombreCarrera : 'Carrera desconocida';
    }

    // Inscripción a una carrera
    public function inscribirseCarrera($idAlumno, $idCarrera) {
        $this->db->query("INSERT INTO inscripcioncarrera (idAlumno, idCarrera) VALUES (:idAlumno, :idCarrera)");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->execute();
    }

    // Desinscripción de una carrera
    public function desinscribirseCarrera($idAlumno, $idCarrera) {
        $this->db->query("DELETE FROM inscripcioncarrera WHERE idAlumno = :idAlumno AND idCarrera = :idCarrera");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->execute();
    }

    // Verifica si el alumno ya está inscripto
    public function yaInscripto($idAlumno, $idCarrera) {
        $this->db->query("SELECT * FROM inscripcioncarrera 
                          WHERE idAlumno = :idAlumno AND idCarrera = :idCarrera AND activo = 1");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->register() ? true : false;
    }

    // Otra variante para verificar inscripción (puede unificarse con la anterior)
    public function estaInscripto($idAlumno, $idCarrera) {
        $this->db->query("SELECT * FROM inscripcioncarrera 
                          WHERE idAlumno = :idAlumno AND idCarrera = :idCarrera AND activo = 1");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->register() ? true : false;
    }

    // Carreras en las que está inscripto el alumno, filtradas por tipo
    public function obtenerCarrerasInscripto($idAlumno, $tipoCarrera) {
        $this->db->query("
            SELECT DISTINCT c.* 
            FROM carrera c
            INNER JOIN inscripcioncarrera i ON c.idCarrera = i.idCarrera
            WHERE i.idAlumno = :idAlumno AND c.tipoCarrera = :tipoCarrera AND i.activo = 1
        ");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':tipoCarrera', $tipoCarrera);
        return $this->db->registers();
    }

     // Nuevo método para obtener todas las IDs de las carreras en las que el alumno está inscripto
    public function obtenerTodasLasInscripcionesDeAlumno($idAlumno) {
        $this->db->query("SELECT idCarrera FROM inscripcioncarrera WHERE idAlumno = :idAlumno AND activo = 1");
        $this->db->bind(':idAlumno', $idAlumno);
        
        $results = $this->db->registers(); // Obtener los resultados
        
        // Asegurarse de que siempre devuelva un array, incluso si no hay resultados
        return $results ? $results : [];
    }
}
?>