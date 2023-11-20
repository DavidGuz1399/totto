<?php 

class Usuario {

	private $table = 'usuario';
	private $conection;

	public function __construct() {
		
	}

	/* Establecer la conexion */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Obtener todas las usuarios */
	public function getUsuarios(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Obtener usuario por Id */
	public function getUsuarioByEmail($email){
		if(is_null($email)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE email = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$email]);

		return $stmt->fetch();
	}

	/* Guardar usuario */
	public function save($param){
		$this->getConection();

		/* Valore por defecto */
		$email = $cedula = $nombre= $apellido= $celular= $departamento= $fecha_nacimiento= $tiene_hijos= $genero = "";

		/* Verificar si existe */
		$exists = false;
		if(isset($param["email"]) and $param["email"] !=''){
			$actualUsuario = $this->getUsuarioByEmail($param["email"]);
			if(isset($actualUsuario["email"])){
				$exists = true;	
				/* Actual values */
				$email = $actualUsuario["email"];
				$cedula = $actualUsuario["cedula"];
				$nombre = $actualUsuario["nombre"];
				$apellido = $actualUsuario["apellido"];
				$celular = $actualUsuario["celular"];
				$departamento = $actualUsuario["departamento"];
				$fecha_nacimiento = $actualUsuario["fecha_nacimiento"];
				$tiene_hijos = $actualUsuario["tiene_hijos"];
				$genero = $actualUsuario["genero"];
			}
		}

		/* Recibir los valores */
		if(isset($param["email"])) $email = $param["email"];
		if(isset($param["cedula"])) $cedula = $param["cedula"];
		if(isset($param["nombre"])) $nombre = $param["nombre"];
		if(isset($param["apellido"])) $apellido = $param["apellido"];
		if(isset($param["celular"])) $celular = $param["celular"];
		if(isset($param["departamento"])) $departamento = $param["departamento"];
		if(isset($param["fecha_nacimiento"])) $fecha_nacimiento = $param["fecha_nacimiento"];
		if(isset($param["tiene_hijos"])) $tiene_hijos = $param["tiene_hijos"];
		if(isset($param["genero"])) $genero = $param["genero"];

		/* Operaciones de base de datos UPDATE si existe INSERT si no existe */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET cedula=?, nombre=?, apellido=?, celular=?, departamento=?, fecha_nacimiento=?,
			tiene_hijos=?,genero=? WHERE email=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$cedula,$nombre, $apellido,$celular, $departamento,$fecha_nacimiento,$tiene_hijos,$genero, $email]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (email) values(?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$email]);
			$id = $this->conection->lastInsertId();
		}	

		return $email;	

	}

	/* Eliminar la usuario popr id */
	public function deleteUsuarioById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>