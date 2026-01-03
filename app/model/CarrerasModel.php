<?php
class CarrerasModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function agregarCarrera($nombreCarrera, $descripcion, $descripcionCompleta, $tipoCarrera, $imagen, $duracionAnios, $duracionMeses) {
    $this->db->query("INSERT INTO carrera 
    (nombreCarrera, descripcionMuestra, descripcionCompletaSideBar, tipoCarrera, rutaImagenMuestra, duracion_anios, duracion_meses, activo)
    VALUES (:nombreCarrera, :descripcion, :descripcionCompleta, :tipoCarrera, :imagen, :duracionAnios, :duracionMeses, 1)");

    $this->db->bind(':nombreCarrera', $nombreCarrera);
    $this->db->bind(':descripcion', $descripcion);
    $this->db->bind(':descripcionCompleta', $descripcionCompleta);
    $this->db->bind(':tipoCarrera', $tipoCarrera);
    $this->db->bind(':imagen', $imagen);
    $this->db->bind(':duracionAnios', $duracionAnios);
    $this->db->bind(':duracionMeses', $duracionMeses);
    return $this->db->execute();
    }

    public function editarCarrera($idCarrera, $nombreCarrera, $descripcion, $descripcionCompleta, $tipoCarrera, $imagen, $duracionAnios, $duracionMeses) {
    $this->db->query("UPDATE carrera SET 
        nombreCarrera = :nombreCarrera,
        descripcionMuestra = :descripcion,
        descripcionCompletaSideBar = :descripcionCompleta,
        tipoCarrera = :tipoCarrera,
        rutaImagenMuestra = :imagen,
        duracion_anios = :duracionAnios,
        duracion_meses = :duracionMeses
        WHERE idCarrera = :idCarrera");

    $this->db->bind(':idCarrera', $idCarrera);
    $this->db->bind(':nombreCarrera', $nombreCarrera);
    $this->db->bind(':descripcion', $descripcion);
    $this->db->bind(':descripcionCompleta', $descripcionCompleta);
    $this->db->bind(':tipoCarrera', $tipoCarrera);
    $this->db->bind(':imagen', $imagen);
    $this->db->bind(':duracionAnios', $duracionAnios);
    $this->db->bind(':duracionMeses', $duracionMeses);

    return $this->db->execute();
    }

    public function obtenerCarrerasFiltradas($tipo = null, $nombre = null, $activo = 1) {
    $query = "SELECT * FROM carrera WHERE activo = :activo";
    $params = [':activo' => $activo];

    if ($tipo && in_array($tipo, ['Curso', 'Grado', 'PosGrado'])) {
        $query .= " AND tipoCarrera = :tipo";
        $params[':tipo'] = $tipo;
    }

    if (!empty($nombre)) {
        $query .= " AND nombreCarrera LIKE :nombre";
        $params[':nombre'] = '%' . $nombre . '%';
    }

    $query .= " ORDER BY nombreCarrera";

    $this->db->query($query);
    foreach ($params as $key => $value) {
        $this->db->bind($key, $value);
    }

    return $this->db->registers();
    }

    public function eliminarCarrera($idCarrera) {
    $this->db->query("UPDATE carrera SET activo = 0 WHERE idCarrera = :id");
    $this->db->bind(':id', $idCarrera);
    return $this->db->execute();
    }

public function activarCarrera($idCarrera) {
    $this->db->query("UPDATE carrera SET activo = 1 WHERE idCarrera = :id");
    $this->db->bind(':id', $idCarrera);
    return $this->db->execute();
    }


    public function obtenerCursos() {
        $this->db->query("SELECT * FROM carrera WHERE tipoCarrera = 'Curso' AND activo = 1");
        return $this->db->registers();
    }

    public function obtenerCarrerasDeGrado() {
        $this->db->query("SELECT * FROM carrera WHERE tipoCarrera = 'Grado' AND activo = 1");
        return $this->db->registers();
    }

    public function obtenerCarrerasDePostGrado() {
        $this->db->query("SELECT * FROM carrera WHERE tipoCarrera = 'PosGrado' AND activo = 1");
        return $this->db->registers();
    }
    public function obtenerTodasLasCarreras() {
        $this->db->query("SELECT * FROM carrera WHERE activo = 1 ORDER BY nombreCarrera");
        return $this->db->registers();
    }
    public function obtenerCarreraPorId($idCarrera) {
    $this->db->query("SELECT * FROM carrera WHERE idCarrera = :idCarrera AND activo = 1");
    $this->db->bind(':idCarrera', $idCarrera);
    return $this->db->register();
    }


    //Validacion para no repetir carreras
    public function carreraExiste($nombreCarrera, $excluirId = null) {
    $query = "SELECT * FROM carrera WHERE LOWER(nombreCarrera) = LOWER(:nombreCarrera)";
    if ($excluirId) {
        $query .= " AND idCarrera != :idCarrera";
    }

    $this->db->query($query);
    $this->db->bind(':nombreCarrera', $nombreCarrera);

    if ($excluirId) {
        $this->db->bind(':idCarrera', $excluirId);
    }

    return $this->db->register() ? true : false;
    }

}
