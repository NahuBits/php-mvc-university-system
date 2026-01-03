<?php
class AuthModel{
    public function __construct(){
        $this->db = new Database;
    }

    public function crearUsuario($data)
	{
		//para hashear la contraseña
		$hash = password_hash($data['ContraUsuario'], PASSWORD_DEFAULT);
		$activo = 1;
		$tipoUsuario  = 'Alumno';
		$this->db->query("INSERT INTO usuario
                          (NombreUsuario, ContraUsuario, Nombre, Apellido, DNI, Email, tipoUsuario, telefono, fotoDePerfil ,activo) 
						  VALUES 
						  (:NombreUsuario, :ContraUsuario, :Nombre, :Apellido, :DNI, :Email, :tipoUsuario, :telefono, :fotoDePerfil , :activo)");
        $this->db->bind(':NombreUsuario', $data['NombreUsuario']);
        $this->db->bind(':ContraUsuario', $hash);
        $this->db->bind(':Nombre', $data['Nombre']);                  
		$this->db->bind(':Apellido', $data['Apellido']);
		$this->db->bind(':DNI', $data['DNI']);
		$this->db->bind(':Email', $data['Email']);
		$this->db->bind(':tipoUsuario', $tipoUsuario);
		$this->db->bind(':telefono', $data['telefono']);
		$this->db->bind(':fotoDePerfil', $data['fotoDePerfil']);
        $this->db->bind(':activo', $activo);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}
	public function editarDatosUsuario($data){
		$this->db->query("UPDATE usuario 
						SET NombreUsuario = :NombreUsuario, Nombre = :Nombre, Apellido = :Apellido, DNI = :DNI, telefono = :telefono, fotoDePerfil = :fotoDePerfil
						WHERE idUsuario = :idUsuario");
		$this->db->bind(':NombreUsuario', $data['NombreUsuario']);
		$this->db->bind(':Nombre', $data['Nombre']);
		$this->db->bind(':Apellido', $data['Apellido']);
		$this->db->bind(':DNI', $data['DNI']);
		$this->db->bind(':telefono', $data['telefono']);
		$this->db->bind(':fotoDePerfil', $data['fotoDePerfil']);
		$this->db->bind(':idUsuario', $data['idUsuario']);
		if($this->db->execute()){
			return true;
		}else {
			return false;
		}
	}
    	/* Método para buscar el mail y la contraseña para comprobar si existe y poder loguear*/

	public function buscarPorMail($data)
	{
		if (!isset($data['email'])) {
        	return false; // Seguridad: evita errores si no viene el índice
    	}

		$this->db->query("SELECT idUsuario, NombreUsuario, ContraUsuario ,Nombre, Apellido, DNI, Email, tipoUsuario, telefono, fotoDePerfil ,activo
							  FROM usuario
							  WHERE Email = :Email
							  AND activo = 1");
		$this->db->bind(':Email', $data['email']);
		
		$result = $this->db->register();
		return $result;
	}
	public function ValidarEmail($email)
	{
		if (!isset($email)) {
        	return false; // Seguridad: evita errores si no viene el índice
    	}
		$this->db->query("SELECT COUNT(*) as email FROM usuario WHERE Email = :Email");
    	$this->db->bind(':Email', $email);
    	$resultado = $this->db->register();

    	return $resultado && $resultado->email > 0;
	}
	//Para mail_pass
	public function cambiarContaseña($pass, $email)
	{
		
		$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
		$this->db->query("UPDATE usuario SET
								ContraUsuario = :pass
							 WHERE Email=:mail");
		$this->db->bind(':pass', $hashed_pass);
		$this->db->bind(':mail', $email);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

    public function buscarPorDNI($data)
	{
		if (!isset($data['DNI'])) {
        	return false; // Seguridad: evita errores si no viene el índice
    	}

		$this->db->query("SELECT idUsuario, NombreUsuario, ContraUsuario ,Nombre, Apellido, DNI, Email, tipoUsuario, telefono, fotoDePerfil ,activo
							  FROM usuario
							  WHERE DNI =:DNI
							  AND activo = 1");
		$this->db->bind('DNI', $data['DNI']);
		
		$result = $this->db->register();
		return $result;
	}
	public function eliminarUsuario($idUser){
		if(!isset($idUser)){
			return false;
		}
		$activo = 0;
		$this->db->query("UPDATE usuario SET activo = :acti WHERE idUsuario =:idUser AND activo = 1");
		$this->db->bind('acti', $activo);
		$this->db->bind('idUser', $idUser);
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function convertirProfesor($idUser){
		if(!isset($idUser)){
			return false;
		}
		$tipoUsuario = "Profesor";
		$this->db->query("UPDATE usuario SET tipoUsuario = :tipoUsuario WHERE idUsuario = :idUser AND activo = 1 AND NOT tipoUsuario = 'Profesor'");
		$this->db->bind(':idUser', $idUser);
		$this->db->bind(':tipoUsuario', $tipoUsuario);
		if($this->db->execute() && $this->db->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function convertirAdmin($idUser){
		if(!isset($idUser)){
			return false;
		}
		$tipoUsuario = "Admin";
		$this->db->query("UPDATE usuario SET tipoUsuario = :tipoUsuario WHERE idUsuario = :idUser AND activo = 1 AND NOT tipoUsuario = 'Admin'");
		$this->db->bind(':idUser', $idUser);
		$this->db->bind(':tipoUsuario', $tipoUsuario);
		if($this->db->execute() && $this->db->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function obtenerTodosLosUsuarios(){
        //$sql = "SELECT NombreUsuario, Nombre, Apellido, DNI, Email, telefono, tipoUsuario FROM usuario WHERE activo = 1";

        $this->db->query("SELECT NombreUsuario, Nombre, Apellido, DNI, Email, telefono, tipoUsuario FROM usuario WHERE activo = 1");
        return $this->db->registers();
       
    
	}
	public function obtenerTodosLosUsuariosPorTipo($tipoUsuario){
        //$sql = "SELECT NombreUsuario, Nombre, Apellido, DNI, Email, telefono, tipoUsuario FROM usuario WHERE activo = 1";

        $this->db->query("SELECT NombreUsuario, Nombre, Apellido, DNI, Email, telefono, tipoUsuario FROM usuario WHERE tipoUsuario = :tipoUsuario AND activo = 1");
        $this->db->bind(':tipoUsuario', $tipoUsuario);
		return $this->db->registers();
       
    
	}
	
}


?>