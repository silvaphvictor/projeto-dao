<?php 

class Usuario {
	private $usuario_id;
	private $usuario_login;
	private $usuario_senha;
	private $usuario_data_cadastro;

	public function getUsuarioID() {
		return $this->usuario_id;
	}
	public function setUsuarioID($usuario_id) {
		$this->usuario_id = $usuario_id;
	}

	public function getUsuarioLogin() {
		return $this->usuario_login;
	}
	public function setUsuarioLogin($usuario_login) {
		$this->usuario_login = $usuario_login;
	}

	public function getUsuarioSenha() {
		return $this->usuario_senha;
	}
	public function setUsuarioSenha($usuario_senha) {
		$this->usuario_senha = $usuario_senha;
	}

	public function getUsuarioDataCadastro() {
		return $this->usuario_data_cadastro;
	}
	public function setUsuarioDataCadastro($usuario_data_cadastro) {
		$this->usuario_data_cadastro = $usuario_data_cadastro;
	}

	public function buscaPorId($id) {
		$sql = new Banco();
		$resultados = $sql->select("SELECT * FROM tb_usuarios WHERE usuario_id = :ID", array(":ID" => $id));

		if(count($resultados[0]) > 0) {
			$linha = $resultados[0];

			$this->setUsuarioID($linha['usuario_id']);
			$this->setUsuarioLogin($linha['usuario_login']);
			$this->setUsuarioSenha($linha['usuario_senha']);
			$this->setUsuarioDataCadastro(new DateTime($linha['usuario_data_cadastro']));
		}
	}

	public function __toString() {
		return json_encode(array(
			"usuario_id"			=> $this->getUsuarioID(),
			"usuario_login"			=> $this->getUsuarioLogin(),
			"usuario_senha"			=> $this->getUsuarioSenha(),
			"usuario_data_cadastro"	=> $this->getUsuarioDataCadastro()->format("d/m/Y H:i:s")
		));
	}
}

?>