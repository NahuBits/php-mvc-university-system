<?php
class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //Metodo para obtener todos profesores
    public function obtenerProfesores() {
        $this->db->query("SELECT * FROM usuario WHERE tipoUsuario = 'Profesor' AND activo = 1 ORDER BY Apellido, Nombre");
        return $this->db->registers();
    }

  public function obtenerClasesPorProfesor($idProfesor) {
    $sql = "SELECT DISTINCT md.*, m.nombreMateria, c.nombreCarrera, c.tipoCarrera, m.idMateria
            FROM materiadictado md
            INNER JOIN materia m ON md.idMateria = m.idMateria
            INNER JOIN carrera c ON md.idCarrera = c.idCarrera
            WHERE md.idProfesor = ? AND md.activo = 1 AND m.activo = 1 AND c.activo = 1";
    
    $this->db->query($sql);
    $this->db->bind(1, $idProfesor);
    return $this->db->registers();
}

public function obtenerAlumnosAgrupadosPorMateria($idProfesor) {
    $this->db->query("
        SELECT 
            m.idMateria,
            m.nombreMateria,
            c.nombreCarrera,
            u.idUsuario,
            u.Nombre AS nombreAlumno,
            u.Apellido AS apellidoAlumno,
            u.Email,
            md.turno,
            md.DiaCursada
        FROM inscripcioncarrera ic
        INNER JOIN usuario u ON ic.idAlumno = u.idUsuario
        INNER JOIN materiadictado md ON ic.idCarrera = md.idCarrera
        INNER JOIN materia m ON md.idMateria = m.idMateria
        INNER JOIN carrera c ON md.idCarrera = c.idCarrera
        WHERE md.idProfesor = :idProfesor
          AND ic.activo = 1 AND md.activo = 1 AND m.activo = 1 AND c.activo = 1
        ORDER BY m.nombreMateria, u.Apellido, u.Nombre
    ");
    $this->db->bind(':idProfesor', $idProfesor);
    return $this->db->registers();
}






}
