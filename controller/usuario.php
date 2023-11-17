<?php 

require_once 'model/usuario.php';

class usuarioController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'registro';
		$this->page_title = '';
		$this->usuarioObj = new Usuario();
	}

	/* Listar todas las cobranzas */
	public function list(){
		$this->page_title = 'Listado de usuarios';
		return $this->usuarioObj->getUsuarios();
	}

	/* Cargar la usuario para editar */
	public function edit($id = null){
		$this->page_title = 'Editar usuario';
		$this->view = 'edit_registro';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->usuarioObj->getUsuarioById($id);
	}

	/* Create or update usuario */
	public function save(){
		$this->view = 'edit_usuario';
		$this->page_title = 'Editar usuario';
		$id = $this->usuarioObj->save($_POST);
		$result = $this->usuarioObj->getUsuarioById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar usuario';
		$this->view = 'confirm_delete_usuario';
		return $this->usuarioObj->getUsuarioById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de usuarios';
		$this->view = 'delete_usuario';
		return $this->usuarioObj->deleteUsuarioById($_POST["id"]);
	}

}

?>