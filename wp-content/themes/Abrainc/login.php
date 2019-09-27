<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header('Location: /indicadores-publicacoes-login/');
	exit();
}

$usuario = msqli_real_escape_string($conexao, $_POST['usuario']);
$senha = msqli_real_escape_string($conexao, $_POST['senha']);

$query = "select usuario_id, usuario from wp_cadastro where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = msqli_query($conexao, $query);
$row = msqli_num_row($resul);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: /indicadores-publicacoes/');
	exit();
}else{
	header('Location: /indicadores-publicacoes-login/');
	exit();
}



