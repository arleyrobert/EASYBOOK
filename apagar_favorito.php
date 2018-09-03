<?php
session_start();
include("conexao/conexao.php");
$id_user = $_SESSION['usuarioId'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE * FROM favoritos inner join pdf on favoritos.id_livro = pdf.id_pdf
            inner join usuarios on favoritos.id_usuario=usuarios.id where id_fav=$id";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>favorito apagado com sucesso</p>";
		header("Location: lista_favoritos.php?id=$id_user");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o favorito não foi apagado com sucesso</p>";
		header("Location: lista_favoritos.php?id=$id_user");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um livro</p>";
	header("Location: lista_favoritos.php?id=$id_user");
}
?>