<?php 

require_once("config.php");

//$banco = new Banco();
//$usuarios = $banco->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

$usuario = new Usuario();
$usuario->buscaPorId(1);
echo $usuario;

?>