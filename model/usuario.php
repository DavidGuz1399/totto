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
	public function getUsuarioById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Guardar usuario */
	public function save($param){
		$this->getConection();

		/* Valore por defecto */
		$title = $content = "";

		/* Verificar si existe */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualCobranza = $this->getCobranzaById($param["id"]);
			if(isset($actualCobranza["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$title = $actualCobranza["title"];
				$content = $actualCobranza["content"];
			}
		}

		/* Recibir los valroes */
		if(isset($param["title"])) $title = $param["title"];
		if(isset($param["content"])) $content = $param["content"];

		/* Operaciones de base de datos UPDATE si existe INSERT si no existe */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET title=?, content=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$title, $content, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (title, content) values(?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$title, $content]);
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