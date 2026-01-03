<?php
class MateriaDictadoModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //Metodo para la Planificacion de las materias. vincula una materia a una carrera y a un profesor
    public function asignarMateriaACarrera($idMateria, $idCarrera, $idProfesor, $cuatrimestre, $turno, $diaCursada, $horaInicio, $horaFin) {
    $this->db->query("INSERT INTO materiadictado 
        (idMateria, idCarrera, idProfesor, cuatrimestre, turno, DiaCursada, horaInicio, horaFin, activo)
        VALUES (:idMateria, :idCarrera, :idProfesor, :cuatrimestre, :turno, :diaCursada, :horaInicio, :horaFin, 1)");

    $this->db->bind(':idMateria', $idMateria);
    $this->db->bind(':idCarrera', $idCarrera);
    $this->db->bind(':idProfesor', $idProfesor);
    $this->db->bind(':cuatrimestre', $cuatrimestre);
    $this->db->bind(':turno', $turno);
    $this->db->bind(':diaCursada', $diaCursada);
    $this->db->bind(':horaInicio', $horaInicio);
    $this->db->bind(':horaFin', $horaFin);

    return $this->db->execute();
    }

    public function profesorTieneConflicto($idProfesor, $dia, $horaInicio, $horaFin, $idMateriaDictado) {
    $query = "
        SELECT * FROM materiadictado 
        WHERE idProfesor = :idProfesor 
          AND activo = 1
          AND DiaCursada LIKE :dia
          AND (
                (:horaInicio BETWEEN horaInicio AND horaFin)
             OR (:horaFin BETWEEN horaInicio AND horaFin)
             OR (horaInicio BETWEEN :horaInicio AND :horaFin)
            )";

        // Excluir el mismo ID  de la materia dictado a editar, para que no entre en conflicto con el horario actual y comparare con las demas materiasdictado
        if ($idMateriaDictado !== null) {
            $query .= " AND id != :idMateriaDictado";
        }
        $this->db->query($query);
        $this->db->bind(':idProfesor', $idProfesor);
        $this->db->bind(':dia', "%$dia%");
        $this->db->bind(':horaInicio', $horaInicio);
        $this->db->bind(':horaFin', $horaFin);
        if($idMateriaDictado !== null){
            $this->db->bind(":idMateriaDictado", $idMateriaDictado);
        }
        return $this->db->register() ? true : false;
    }


    public function listarMateriasDictado(){
            $this->db->query("SELECT md.id AS IDMateriaDetalle, m.nombreMateria, c.nombreCarrera, u.Nombre, cuatrimestre, turno, DiaCursada, horaInicio, horaFin 
            FROM materiadictado md 
            JOIN materia m ON md.idMateria = m.idMateria 
            JOIN carrera c ON md.idCarrera = c.idCarrera 
            JOIN usuario u ON md.idProfesor = u.idUsuario 
            WHERE md.activo = 1; ");
            return $this->db->registers();
        }
    public function EditarMateriaDictado($IDmateriadictado, $idMateria, $idCarrera, $idProfesor, $cuatrimestre, $turno, $diaCursada, $horaInicio, $horaFin){
       $this->db->query("UPDATE materiadictado SET IdMateria = :idMateria, idCarrera = :idCarrera, idProfesor = :idProfesor, cuatrimestre = :cuatrimestre, turno = :turno, diaCursada= :diaCursada, horaInicio = :horaInicio, horaFin = :horaFin
       WHERE id = :IDmateriadictado
       ");

       $this->db->bind(':IDmateriadictado', $IDmateriadictado);
       $this->db->bind(':idMateria', $idMateria);
       $this->db->bind(':idCarrera', $idCarrera);
       $this->db->bind(':idProfesor', $idProfesor);
       $this->db->bind(':cuatrimestre', $cuatrimestre);
       $this->db->bind(':turno', $turno);
       $this->db->bind(':diaCursada', $diaCursada);
       $this->db->bind(':horaInicio', $horaInicio);
       $this->db->bind(':horaFin', $horaFin);
       return $this->db->execute();
    }

    public function obtenerMateriaDictadoPorId($id){
        $this->db->query("SELECT md.id AS IDMateriaDetalle, idCarrera, idMateria, idProfesor, cuatrimestre, turno, DiaCursada, horaInicio, horaFin  
        FROM materiadictado md
        WHERE md.id = :id");
        $this->db->bind(':id', $id);
        return $this->db->register();

    }

    public function eliminarMateriaDictado($id){
        $this->db->query("DELETE FROM materiadictado WHERE id =:id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
