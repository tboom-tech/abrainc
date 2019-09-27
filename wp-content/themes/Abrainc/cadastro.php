<?php

	require_once('base-config.php');

	if ($_POST) {

	parse_str($_POST['dados'], $dados);

	foreach($dados as $key => $value){
		$_POST[$key]=utf8_decode($value);
	}

	extract($_POST);

	$data = date("d-m-Y");

	$sql ="INSERT INTO wp_cadastro VALUES ";
	$sql .= "(NULL, '$name', '$email', '$telefone', '$usuario', '$senha');";

	mysqli_query($conexao,$sql);

	}	
?>	