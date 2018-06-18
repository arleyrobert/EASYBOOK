<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM contato WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Contato apagado com sucesso</p>";
		header("Location: ver_contatos.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o contato não foi apagado com sucesso</p>";
		header("Location: ver_contatos.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um contato</p>";
	header("Location: ver_contatos.php");
}