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
		$email = $content = "";

		/* Verificar si existe */
		$exists = false;
		if(isset($param["email"]) and $param["email"] !=''){
			$actualUsuario = $this->getUsuarioByEmail($param["email"]);
			if(isset($actualUsuario["email"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$email = $actualUsuario["email"];
				$content = $actualUsuario["content"];
			}
		}

		/* Recibir los valores */
		if(isset($param["email"])) $email = $param["email"];
		if(isset($param["content"])) $content = $param["content"];

		/* Operaciones de base de datos UPDATE si existe INSERT si no existe */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET email=?, content=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$email, $content, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (email) values(?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$email]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

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