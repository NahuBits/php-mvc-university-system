<?php
class NovedadesModel{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function CrearNoticias($Titulo, $Descripcion, $Activo ,$Selecionado){
        $query = "INSERT INTO novedades(Titulo, Descripcion, Activo, Selecionado) VALUES (:Titulo, :Descripcion, :Activo, :Selecionado)";

        $this->db->query($query);

        $this->db->bind(":Titulo", $Titulo);
        $this->db->bind(":Descripcion", $Descripcion);
        $this->db->bind(":Activo", $Activo);
        $this->db->bind(":Selecionado", $Selecionado);
        return $this->db->execute();
    }

    public function EliminarNoticias($id){
        $query = "UPDATE novedades SET Activo = 0 WHERE idNovedades = :id AND Activo = 1";
        $this->db->query($query);
        $this->db->bind(":id", $id);
        return $this->db->execute();
    }
    public function ActualizarSelecionado($id, $Selecionado){
        $query = "UPDATE novedades SET selecionado = :Selecionado WHERE idNovedades = :id AND Activo = 1";
        
        $this->db->query($query);
        $this->db->bind(":Selecionado", $Selecionado);
        $this->db->bind(":id", $id);
        return $this->db->execute();
    }
    public function EditarNoticia($id, $Titulo, $Descripcion,  $Activo, $Selecionado){
        $query = "UPDATE novedades SET Titulo = :Titulo, Descripcion = :Descripcion, Activo = :Activo, Selecionado = :Selecionado WHERE idNovedades = :id";
        $this->db->query($query);
        $this->db->bind(":Titulo", $Titulo);
        $this->db->bind(":Descripcion", $Descripcion);
        $this->db->bind(":Activo", $Activo);
        $this->db->bind(":Selecionado", $Selecionado);
        $this->db->bind(":id", $id);

        return $this->db->execute();
    }

    public function ObtenerTodasLasNoticias(){
        $query = "SELECT idNovedades, Titulo, Descripcion, Activo, Selecionado FROM novedades WHERE Activo = 1";
        $this->db->query($query);
        return $this->db->registers();
    }
    public function ObtenerNoticiasSelecionadas(){
        $query = "SELECT Titulo, Descripcion FROM novedades WHERE Selecionado = 1 AND Activo = 1";
        $this->db->query($query);
        return $this->db->registers();

    }
    public function ObtenerNoticiaPorId($Id){
        $query = "SELECT  idNovedades, Titulo, Descripcion, Activo, Selecionado FROM novedades WHERE idNovedades = :Id";
        $this->db->query($query);
        $this->db->bind(":Id", $Id);
        return $this->db->register();
    }
    public function NoticiaTituloExiste($Titulo, $id){
        $query = "SELECT COUNT(*) AS Result  FROM novedades WHERE LOWER(Titulo) = LOWER(:Titulo) AND Activo = 1";
        if ($id !== null) {
            $query .= " AND idNovedades != :idNovedades";
        }
        
        $this->db->query($query);
        if($id !== null){
            $this->db->bind(":idNovedades", $id);
        }
        $this->db->bind(":Titulo", $Titulo);
        
        $Resultado = $this->db->register();
        return $Resultado && $Resultado->Result > 0;
    }








}

?>